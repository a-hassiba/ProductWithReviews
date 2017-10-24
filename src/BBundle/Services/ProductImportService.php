<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 22:10
 */

namespace BBundle\Services;
use BBundle\Entity\Review;
use BBundle\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductImportService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->taskRepository = $this->entityManager->getRepository('BBundle:Product');
    }

    public function import()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://internal.ats-digital.com:3066/api/products');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $products = json_decode($response);
   ;
        foreach ($products as $product){
            $prod = new Product();
            $prod->setProductName($product->productName);
            $prod->setBasePrice($product->basePrice);
            $prod->setBrand($product->brand);
            $prod->setCategory($product->category);
            $prod->setProductMaterial($product->productMaterial);
            $prod->setImageUrl($product->imageUrl);
            $prod->setDelivery($product->delivery);
            $prod->setDetails($product->details);
            $reviews = $product->reviews;
            foreach ($reviews as $review) {
                $rev = new Review();
                $rating = $review->rating;
                $content = $review->content;
                $rev->setProduct($prod);
                $rev->setRating($rating);
                $rev->setContent($content);
                $this->entityManager->persist($rev);
            }
            $this->entityManager->persist($prod);
        }
        $this->entityManager->flush();

    }


}