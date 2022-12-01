<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
*/
class NavigationController extends AbstractController
{
        /**
         * @Route("/", name="home")
         */
        public function home()
        {
                return $this->render('navigation/home.html.twig');
        }

        /**
         * @Route("/membre", name="membre")
         */
        public function membre()
        {
                return $this->render('navigation/membre.html.twig');
        }

        /**
         * @Route("/admin", name="admin")
         */
        public function admin()
        {
                return $this->render('navigation/admin.html.twig');
        }

}