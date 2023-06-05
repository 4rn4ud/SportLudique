<?php

namespace App\Controller;

use App\Entity\CommandFournisseur;
use App\Form\CommandFournisseurType;
use App\Repository\CommandFournisseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/command/fournisseur')]
class CommandFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_command_fournisseur_index', methods: ['GET'])]
    public function index(CommandFournisseurRepository $commandFournisseurRepository): Response
    {
        return $this->render('command_fournisseur/index.html.twig', [
            'command_fournisseurs' => $commandFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_command_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CommandFournisseurRepository $commandFournisseurRepository): Response
    {
        $commandFournisseur = new CommandFournisseur();
        $form = $this->createForm(CommandFournisseurType::class, $commandFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandFournisseurRepository->save($commandFournisseur, true);

            return $this->redirectToRoute('app_command_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('command_fournisseur/new.html.twig', [
            'command_fournisseur' => $commandFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_command_fournisseur_show', methods: ['GET'])]
    public function show(CommandFournisseur $commandFournisseur): Response
    {
        return $this->render('command_fournisseur/show.html.twig', [
            'command_fournisseur' => $commandFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_command_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommandFournisseur $commandFournisseur, CommandFournisseurRepository $commandFournisseurRepository): Response
    {
        $form = $this->createForm(CommandFournisseurType::class, $commandFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandFournisseurRepository->save($commandFournisseur, true);

            return $this->redirectToRoute('app_command_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('command_fournisseur/edit.html.twig', [
            'command_fournisseur' => $commandFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_command_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, CommandFournisseur $commandFournisseur, CommandFournisseurRepository $commandFournisseurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandFournisseur->getId(), $request->request->get('_token'))) {
            $commandFournisseurRepository->remove($commandFournisseur, true);
        }

        return $this->redirectToRoute('app_command_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
