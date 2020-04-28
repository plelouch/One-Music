<?php

namespace App\Controller;

use App\Entity\Clip;
use App\Form\ClipType;
use App\Repository\ClipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clip")
 */
class ClipController extends AbstractController
{
    /**
     * @Route("/", name="clip_index", methods={"GET"})
     */
    public function index(ClipRepository $clipRepository): Response
    {
        return $this->render('clip/index.html.twig', [
            'clips' => $clipRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="clip_show", methods={"GET"})
     */
    public function show(Clip $clip): Response
    {
        return $this->render('clip/show.html.twig', [
            'clip' => $clip,
        ]);
    }

}
