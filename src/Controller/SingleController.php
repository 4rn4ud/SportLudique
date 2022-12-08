<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/single')]
class SingleController extends AbstractController
{
    #[Route('/{id}', name: 'app_single_index', methods: ['GET'])]
    public function index(Product $product, ProductRepository $productRepository): Response
    {
        return $this->render('single.html.twig', [
            'controller_name' => 'SingleController',
            'product' => $product,
        ]);
    }
}