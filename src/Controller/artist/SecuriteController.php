<?php


namespace App\Controller\artist;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecuriteController extends AbstractController
{
    /**
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/artist/login", name="artist_app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('artist/security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'hasError' => $authenticationUtils->getLastAuthenticationError() !== null
        ]);
    }

    /**
     * @Route("/artist/logout", name="artist_app_logout")
     */
    public function logout(){}
}