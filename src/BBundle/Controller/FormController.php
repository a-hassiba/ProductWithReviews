<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 08:04
 */

namespace BBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use BBundle\Form\Filter\ItemFilterType;
use BBundle\Form\Filter\ItemFilterObject;
use Symfony\Component\HttpFoundation\Response;


class FormController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testFilterAction(Request $request)
    {
        $filterObject = new ItemFilterObject();

        $filterForm   = $this->createForm(new ItemFilterType, $filterObject);

        // Création du formulaire
        $filterObject = new ItemFilterObject();
        $filterForm   = $this->createForm(new ItemFilterType(), $filterObject);

        if ($request->query->has($filterForm->getName())) { die;
           $filterForm->submit($request->query->get($filterForm->getName()));
           dump('bcn'); die;
        }



        return $this->render('BBundle:Filter:testFilter.html.twig', array(
            'form' => $filterForm->createView(),
        ));
    }

    public function contactAction(Request $request)
    {
        // Création du formulaire
        $contactObject = new ItemFilterObject();
        $contactForm   = $this->createForm(new ItemFilterType(), $contactObject);

        // Traitement du formulaire en POST
        if ($request->getMethod() == Request::METHOD_POST) {
            $contactForm->handleRequest($request);

            $response = new JsonResponse();
            $response->setPrivate();

            $data = $contactForm->getData();

            if ($contactForm->isValid()) {

                // On enregistre le formulaire en bdd
                //$this->get("ddorresi_common.form_persister.service")->saveContactForm($data);
                $response->setStatusCode(Response::HTTP_OK);

            } else {

                $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                $response->setData(array(
                    'formErrors' => $this->renderView('BBundle:Filter:testFilter.html.twig',
                        array('form' => $contactForm->createView()))
                ));
            }

            return $response;
        }


        $response =  $this->render('BBundle:Filter:testFilter.html.twig', array(
            'form' => $contactForm->createView(),
        ));
        $response->setPrivate();

        return $response;
    }
}