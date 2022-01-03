<?php

namespace App\Controller;



use App\Entity\Annonces;
use App\Entity\User;
use App\Form\ModifierProfilType;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        $em1 = $this->getDoctrine()->getManager();
        $annonces = $em1->getRepository(Annonces::class)->findAll();

        return $this->render('user/index.html.twig',["annonces"=> $annonces]);

    }

    /**
     * @Route("/list/users", methods="GET")
     */
    public function getListUsers(): Response
    {

        // récupérer data de la base de donnée
        // $listUSER = tableau ;
        // return new JsonResponse([ $listUSER]);
        $name = "klai";
        return new JsonResponse([
            'success' => true
        ]);
    }


    /**
     * @Route("/users/profil/modifier", name="users_profil_modifier")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editProfile(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(ModifierProfilType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('user');
        }

        return $this->render('user/modfierProfil.html.twig', [
            'form' => $form->createView(),
        ]);
    }













}
