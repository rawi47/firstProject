<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostController extends AbstractController
{



    /**
     * @Route("/post/{id}", name="app_post_show", requirements={"id":"\d+"})
     */

    public function show(post $post): Response
    {

        return $this->render('post/show.html.twig', [
           "post" => $post
        ]);

    }


    /**
     * @Route("/post", name="app_post_new")
     */

    public function new(Request $request, FileUploader $fileUploader, EntityManagerInterface $entityManager): Response
    {
        $post = new post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                $newFilename = $fileUploader->upload($imageFile);
                $post->setImage($newFilename);
                $entityManager->persist($post);
                $entityManager->flush();

            }

            return $this->redirectToRoute('home');
        }

        return $this->render('post/newpost.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/post/edit/{id}", name="app_post_edit", requirements={"id":"\d+"})
     */

    public function edit(Request $request, Post $post): Response
    {

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->redirectToRoute('app_post_index');
        }

        return $this->render('post/post.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/post/delete/{id}", name="app_post_delete", requirements={"id":"\d+"})
     */
    public function delete(Post $post): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($post);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return $this->redirectToRoute('app_post_index');
    }
}