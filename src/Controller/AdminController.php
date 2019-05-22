<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_base")
     */
    public function index()
    {
        return $this->render('adminbase.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
