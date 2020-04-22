<?php


namespace App\Controller\artist;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/artist", name="artist_homepage")
     */
    public function index()
    {
        return $this->render('artist/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}