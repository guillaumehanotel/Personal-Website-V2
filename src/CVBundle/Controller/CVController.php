<?php

namespace CVBundle\Controller;

use CVBundle\Entity\Competence;
use CVBundle\Entity\Experience;
use CVBundle\Entity\Formation;
use CVBundle\Entity\Intro;
use CVBundle\Entity\Realisation;
use CVBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CVController extends Controller {

    public function indexAction(Request $request) {

        $doctrine = $this->getDoctrine();
        $introManager = $doctrine->getRepository(Intro::class);
        $intro = $introManager->find(1);

        return $this->render('CVBundle:CV:index.html.twig', [
            'titre' => $intro->getTitre()
        ]);
    }


    public function introAction(Request $request){
        $doctrine = $this->getDoctrine();
        $introManager = $doctrine->getRepository(Intro::class);
        $intro = $introManager->find(1);

        return $this->render('CVBundle:CV:intro.html.twig', [
            'content' => $intro->getContent()
        ]);
    }


    public function projetAction(Request $request){
        $doctrine = $this->getDoctrine();
        $realisationManager = $doctrine->getRepository(Realisation::class);
        $realisations = $realisationManager->findAll();

        return $this->render('CVBundle:CV:projets.html.twig', [
            'realisations' => $realisations
        ]);
    }


    public function experienceAction(Request $request){
        $doctrine = $this->getDoctrine();
        $experienceManager = $doctrine->getRepository(Experience::class);
        $experiences = $experienceManager->findAll();

        return $this->render('CVBundle:CV:experiences.html.twig', [
            'experiences' => $experiences
        ]);
    }


    public function competenceAction(Request $request){
        $doctrine = $this->getDoctrine();
        $competenceManager = $doctrine->getRepository(Competence::class);
        $competences = $competenceManager->findAll();

        return $this->render('CVBundle:CV:competences.html.twig', [
            'competences' => $competences
        ]);
    }


    public function formationAction(Request $request){
        $doctrine = $this->getDoctrine();
        $formationManager = $doctrine->getRepository(Formation::class);
        $formations = $formationManager->findAll();

        return $this->render('CVBundle:CV:formations.html.twig', [
            'formations' => $formations
        ]);
    }

    public function contactAction(Request $request){

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
            if($form->isValid() && $form->isSubmitted()){
                if($this->sendEmail($form->getData())){
                    $this->addFlash('success', 'Votre message a bien été envoyé !');
                    return $this->redirect($request->getUri());
                } else {
                    $this->addFlash('danger', 'Erreur lors de l\'envoi du message');
                }
            }

        return $this->render('CVBundle:CV:contact.html.twig', [
            'form' => $form->createView()
        ]);
    }


    private function sendEmail($data){

        $mailer = $this->get('mailer');
        $myContactMail = $this->container->getParameter('mailer_user');

        $message = new \Swift_Message();
        $message->setSubject($data['sujet'])
                ->setFrom($myContactMail)
                ->setTo($myContactMail)
                ->setBody(
                    "Message de : ".$data['nom']
                    ."\n\n" .
                    $data['message'].
                    "\n\nContact Mail : ".$data["email"]
                );

        $message->getHeaders()->addIdHeader('Message-ID', "b3eb7202-d2f1-11e4-b9d6-1681e6b88ec1@domain.com");
        $message->getHeaders()->addTextHeader('MIME-Version', '1.0');
        $message->getHeaders()->addTextHeader('X-Mailer', 'PHP v' . phpversion());
        $message->getHeaders()->addParameterizedHeader('Content-type', 'text/html', ['charset' => 'utf-8']);

        return $mailer->send($message);

    }




}
