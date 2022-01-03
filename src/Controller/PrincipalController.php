<?php

namespace App\Controller;


use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PrincipalController extends AbstractController
{

    //Router pour la page home
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('principal/home.html.twig', [
            'controller_name' => 'PrincipalController',


        ]);
    }

    /**
     * @Route("/liste", name="liste")
     */
    public function liste(): Response
    {
        return $this->render('principal/listeAnnonces.hmtl.twig', [
            'controller_name' => 'PrincipalControllerr',


        ]);
    }

    /**
     * @return  Response
     * @Route("/formations", name="formations")
     */
    public function formations(): Response
    {
        return $this->render('principal/formations.html.twig', [
            'controller_name' => 'PrincipalController',


        ]);
    }

    /**
     * @Route("/teste", name="teste")
     */
    public function test(): Response
    {
        return $this->render('principal/test.html.twig', [
            'controller_name' => 'PrincipalController',


        ]);
    }

    /**
     * @Route("/404", name="404")
     */
    public function maintenance(): Response
    {
        return $this->render('maintenance/404.html.twig', [
            'controller_name' => 'PrincipalController',


        ]);
    }


    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */
    public function contact(Request $request): Response
    {
        $contact = new Contact;
        # Add form fields
        $form = $this->createFormBuilder($contact)
            ->add('nom', TextType::class, array('label' => 'Nom', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', TextType::class, array('label' => 'E-mail', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('message', TextareaType::class, array('label' => 'Message', 'attr' => array('class' => 'form-control')))
            ->add('Envoyer', SubmitType::class, array('label' => 'submit', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')))
            ->getForm();
        # Handle form response
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nom = $form ['nom']->getData();
            $email = $form ['email']->getData();
            $message = $form ['message']->getData();
            # définir les données du formulaire
            $contact->setNom($nom);
            $contact->setEmail($email);
            $contact->setMessage($message);
            # enfin ajouter des données dans la base de données
            $sn = $this->getDoctrine()->getManager();
            $sn->persist($contact);
            $sn->flush();

            $this->addFlash('message', 'Votre message bien envoyer Merci');
            return $this->redirectToRoute('contact');

        }

        return $this->render('principal/contact.html.twig', [
            'form' => $form->createView()
        ]);

    }





}
