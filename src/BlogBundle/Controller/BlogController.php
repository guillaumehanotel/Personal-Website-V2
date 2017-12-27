<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Post;

class BlogController extends Controller {

    public function indexAction(Request $request) {

        $doctrine = $this->getDoctrine();
        $postManager = $doctrine->getRepository(Post::class);
        $posts = $postManager->findAll();

        return $this->render('BlogBundle:Blog:index.html.twig', [
            'posts' => $posts
        ]);

    }


    public function postAction(Request $request, int $id) {

        $doctrine = $this->getDoctrine();
        $postManager = $doctrine->getRepository(Post::class);
        $post = $postManager->find($id);

        $commentManager = $doctrine->getRepository(Comment::class);
        $comments = $commentManager->findBy(['Post' => $post->getId(), 'is_valid' => true]);


        return $this->render('BlogBundle:Blog:post.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);

    }






}