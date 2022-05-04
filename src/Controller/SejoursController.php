<?php

namespace App\Controller;

use App\Entity\Sejours;
use App\Form\Sejours1Type;
use App\Repository\SejourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sejours')]
class SejoursController extends AbstractController
{
    #[Route('/', name: 'sejours_index', methods: ['GET'])]
    public function index(SejourRepository $sejourRepository): Response
    {
        return $this->render('sejours/index.html.twig', [
            'sejours' => $sejourRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'sejours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sejour = new Sejours();
        $form = $this->createForm(Sejours1Type::class, $sejour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sejour);
            $entityManager->flush();

            return $this->redirectToRoute('sejours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sejours/new.html.twig', [
            'sejour' => $sejour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'sejours_show', methods: ['GET'])]
    public function show(Sejours $sejour): Response
    {
        return $this->render('sejours/show.html.twig', [
            'sejour' => $sejour,
        ]);
    }

    #[Route('/{id}/edit', name: 'sejours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sejours $sejour, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Sejours1Type::class, $sejour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('sejours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sejours/edit.html.twig', [
            'sejour' => $sejour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'sejours_delete', methods: ['POST'])]
    public function delete(Request $request, Sejours $sejour, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sejour->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sejour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sejours_index', [], Response::HTTP_SEE_OTHER);
    }
}
