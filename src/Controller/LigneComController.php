<?php

namespace App\Controller;

use App\Entity\LigneCom;
use App\Form\LigneComType;
use App\Repository\LigneComRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lignecom')]
class LigneComController extends AbstractController
{
    #[Route('/', name: 'app_ligne_com_index', methods: ['GET'])]
    public function index(LigneComRepository $ligneComRepository): Response
    {
        return $this->render('ligne_com/index.html.twig', [
            'ligne_coms' => $ligneComRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_com_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LigneComRepository $ligneComRepository): Response
    {
        $ligneCom = new LigneCom();
        $form = $this->createForm(LigneComType::class, $ligneCom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ligneComRepository->save($ligneCom, true);

            return $this->redirectToRoute('app_ligne_com_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ligne_com/new.html.twig', [
            'ligne_com' => $ligneCom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_com_show', methods: ['GET'])]
    public function show(LigneCom $ligneCom): Response
    {
        return $this->render('ligne_com/show.html.twig', [
            'ligne_com' => $ligneCom,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_com_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneCom $ligneCom, LigneComRepository $ligneComRepository): Response
    {
        $form = $this->createForm(LigneComType::class, $ligneCom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ligneComRepository->save($ligneCom, true);

            return $this->redirectToRoute('app_ligne_com_index', [], Response::HTTP_SEE_OTHER);
        }
 
        return $this->renderForm('ligne_com/edit.html.twig', [
            'ligne_com' => $ligneCom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_com_delete', methods: ['POST'])]
    public function delete(Request $request, LigneCom $ligneCom, LigneComRepository $ligneComRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneCom->getId(), $request->request->get('_token'))) {
            $ligneComRepository->remove($ligneCom, true);
        }

        return $this->redirectToRoute('app_ligne_com_index', [], Response::HTTP_SEE_OTHER);
    }
}
