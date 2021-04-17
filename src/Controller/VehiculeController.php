<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class VehiculeController extends AbstractController
{

    /**
     * @Route("/vehicule", name="app_vehicule_index")
     */

    public function index(VehiculeRepository $vehiculeRepository): Response
    {

        return $this->render('vehicule/index.html.twig', [
           "vehicules" => $vehiculeRepository->findAll()
        ]);

    }

    /**
     * @Route("/vehicule/{id}", name="app_vehicule_show", requirements={"id":"\d+"})
     */

    public function show(Vehicule $vehicule): Response
    {

        return $this->render('vehicule/show.html.twig', [
           "vehicule" => $vehicule
        ]);

    }

    /**
     * @Route("/vehicule/new", name="app_vehicule_new")
     */

    public function new(Request $request): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->redirectToRoute('app_vehicule_index');
        }

        return $this->render('vehicule/vehicule.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/vehicule/edit/{id}", name="app_vehicule_edit", requirements={"id":"\d+"})
     */

    public function edit(Request $request, Vehicule $vehicule): Response
    {

        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->redirectToRoute('app_vehicule_index');
        }

        return $this->render('vehicule/vehicule.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/vehicule/delete/{id}", name="app_vehicule_delete", requirements={"id":"\d+"})
     */
    public function delete(Vehicule $vehicule): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($vehicule);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return $this->redirectToRoute('app_vehicule_index');

    }
}
