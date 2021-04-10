<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */

    public function home(): Response
    {
        return $this->render('home/home.html.twig', []);
    }

    /**
     * @Route("/test/{nom}", name="test")
     */
    public function test($nom)
    {
        $user = [];
        $user['isLoggedIn'] = false;
        $user['name'] = $nom;
        return $this->render('home/test.html.twig', [
            "page_title" => "Page de test",
            'user' => $user
        ]);
    }
}
