<?php

namespace App\Controller\artist;

use App\Entity\Clip;
use App\Form\ClipType;
use App\Repository\ClipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ClipController
 * @package App\Controller\artist
 * @Route("/artist/clip", name="artist_")
 */
class ClipController extends AbstractController
{

    /**
     * @Route("/", name="clip_index", methods={"GET"})
     */
    public function index(ClipRepository $clipRepository): Response
    {
        return $this->render('artist/video/index.html.twig', [
            'clips' => $clipRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="clip_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clip = new Clip();
        $form = $this->createForm(ClipType::class, $clip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $clip->setAuthor($this->getUser());

            $entityManager->persist($clip);
            $entityManager->flush();

            return $this->redirectToRoute('artist_clip_index');
        }

        return $this->render('artist/video/new.html.twig', [
            'clip' => $clip,
            'form' => $form->createView(),
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

    /**
     * @Route("/{id}/edit", name="clip_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Clip $clip): Response
    {
        $form = $this->createForm(ClipType::class, $clip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clip_index');
        }

        return $this->render('artist/clip/edit.html.twig', [
            'clip' => $clip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clip_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Clip $clip): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clip->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clip);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clip_index');
    }
}