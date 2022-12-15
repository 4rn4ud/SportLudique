<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop')]
    public function index(ProductRepository $productRepository, Request $request): Response
    {
        //$product = new Product();
        
        if ($request->isMethod('GET')) 
        {
            if($request->get('search') == null)
            {
                return $this->render('shop.html.twig', [
                    'controller_name' => 'ShopController',
                    'products' => $productRepository->findAll(),
                ]);
            }
            $recherche = $request->get('search');
            $product = $productRepository->findOneBy(['label' => $recherche]);
            
            
            return $this->render('shop.html.twig', 
            [
                'controller_name' => 'ShopController',
                'products' => $product,
            ]);
        }
        
        
    }
}