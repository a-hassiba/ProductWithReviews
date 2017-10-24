<?php

namespace BBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BBundle\Entity\Review;
use BBundle\Entity\Product;
use BBundle\Entity\Task;
use BBundle\Entity\TaskType;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();

        $form = $this->createForm(new TaskType($this->get('form_service')), $task);

        $form->handleRequest($request);
            // initialize a query builder
            $formService =  $this->get('form_service');
        $products = $formService->getAllProducts();

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $category = $task->getCategory();
            $products = $formService->getProductForCategory($category);

            return $this->render('BBundle:Default:new.html.twig', array(
                'form' => $form->createView(),
                'products' => $products
            ));
        }

        return $this->render('BBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
            'products' => $products
        ));
    }

    public function successAction()
    {
        return $this->render('BBundle:Default:success.html.twig');
    }

    public function translationAction()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://internal.ats-digital.com:3066/api/products');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $products = json_decode($response);
        $em = $this->getDoctrine()->getManager();
        foreach ($products as $product){
            dump($product); die;
           $pn = $product->productName;
           $basePrice = $product->basePrice;
            $prod = new Product();
            $prod->setProductName($pn);
            $prod->setBasePrice($basePrice);
            $reviews = $product->reviews;
            foreach ($reviews as $review) {
                $rev = new Review();
                $rating = $review->rating;
                $content = $review->content;
                $rev->setProduct($prod);
                $rev->setRating($rating);
                $rev->setContent($content);
            }
                $em->persist($prod);
                $em->persist($rev);
        }
        $em->flush();


        return $this->render('BBundle:Default:translation.html.twig');
    }


}
