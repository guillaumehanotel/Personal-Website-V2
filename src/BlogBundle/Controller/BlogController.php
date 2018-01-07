<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Comment;
use BlogBundle\Entity\Post;
use CVBundle\Entity\Intro;
use BlogBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller {

    public function indexAction(Request $request, int $page) {

        // get nbPost parameter
        $nbPostPerPage = $this->container->getParameter('nb_post_per_page');

        $doctrine = $this->getDoctrine();
        $postRepository = $doctrine->getRepository(Post::class);

        $posts = $postRepository->findAllPaginate($page, $nbPostPerPage);

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


    /**
     * @param Request $request
     * @param int $id
     * @var \BlogBundle\Entity\User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(Request $request, int $id) {

        $doctrine = $this->getDoctrine();

        $introRepository = $doctrine->getRepository(Intro::class);
        $intro_titre = $introRepository->findOneBy([])->getTitre();

        $postRepository = $doctrine->getRepository(Post::class);
        $post = $postRepository->find($id);

        $commentRepository = $doctrine->getRepository(Comment::class);
        $comments = $commentRepository->findValidCommentsByPost($post);

        $comment = new Comment();
        $comment_form = $this->createForm(CommentType::class, $comment);
        $comment_form->handleRequest($request);

        if ($comment_form->isSubmitted()) {

            $comment->setPost($post);

            // si le name null -> utilisateur connecté
            if(is_null($comment->getName())){
                $token = $this->get('security.token_storage')->getToken();
                $user = $token->getUser();

                $comment->setUser($user);
                $comment->setName($user->getFirstname().' '.substr($user->getLastname(), 0, 1));
            }

            $em = $doctrine->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Votre commentaire a bien été envoyé, il doit être validé avant d\'être affiché');
            return $this->redirect($request->getUri());
        }


        return $this->render('BlogBundle:Blog:post.html.twig', [
            'post' => $post,
            'comments' => $comments,
            'comment_form' => $comment_form->createView(),
            'intro_titre' => $intro_titre
        ]);

    }


    public function lastPostAction(Request $request){

        $nbLastPost = $this->container->getParameter('nb_last_post');

        $doctrine = $this->getDoctrine();
        $postRepository = $doctrine->getRepository(Post::class);
        $lastPosts = $postRepository->findLastPosts($nbLastPost);

        return $this->render('BlogBundle:Blog:last_posts.html.twig', [
            'last_posts' => $lastPosts
        ]);

    }





}