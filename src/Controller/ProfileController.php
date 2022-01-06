<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile", name="profile_")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/password", name="password")
     * @IsGranted("ROLE_USER")
     */
    public function changePassword(): Response
    {
        //$user = $this->getUser();

        //$currentPassword = $user->getPassword();

        //var_dump($currentPassword);



        return $this->render('');
    }
}
