<?php
// src/Controller/BaseController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/base', name: 'base')]
    public function indexAction()
    {
        return $this->render("base.html.twig");
    }
}