<?php
namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;


class BlogController extends AbstractController{


    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(){

        $user = [
            "name" => "Bouraoui",
            "prenom" => "mejri",
            "Cin" => 123
        ];
        $comment = [
            "publishedAt" => new DateTime()
        ];

        return $this->render('blog/index.html.twig', [
            "user" => $user,
            "comment" => $comment,
            "pays" => "France",

        ]);

    }

    /**
     * @Route("/blog/show", name="app_blog_show")
     */
    public function show() {
        $posts = [
            "Premiere post",
            "Deuxiemme post",
            "Troisiemme post",
            "4ieme post",
        ];
        return $this->render('blog/show.html.twig', [
            "posts" => $posts
        ]);
    }
}