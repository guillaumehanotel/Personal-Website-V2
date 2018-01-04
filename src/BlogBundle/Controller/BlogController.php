<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Post;

class BlogController extends Controller {

    public function indexAction(Request $request, int $page) {

        // get nbPost parameter
        $nbPostPerPage = $this->container->getParameter('nb_post_per_page');

        $doctrine = $this->getDoctrine();
        $postManager = $doctrine->getRepository(Post::class);

        $posts = $postManager->findAllPaginate($page, $nbPostPerPage);

        $pagination = [
          'page' => $page,
          'nbPages' => ceil(count($posts) / $nbPostPerPage),
          'nomRoute' => 'blog_home',
          'paramsRoute' => []
        ];
        
        return $this->render('BlogBundle:Blog:index.html.twig', [
            'posts' => $posts,
            'pagination' => $pagination
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