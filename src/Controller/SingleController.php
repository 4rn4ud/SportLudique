<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/single')]
class SingleController extends AbstractController
{
    #[Route('/{id}', name: 'app_single_index', methods: ['GET'])]
    public function index(Product $product, CommentRepository $commentRepository): Response
    {
        return $this->render('single.html.twig', [
            'controller_name' => 'SingleController',
            'product' => $product,
            'comments' => $commentRepository->findAll(),
        ]);
    }
}