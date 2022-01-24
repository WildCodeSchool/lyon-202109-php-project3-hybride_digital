<?php

namespace App\Controller;

use App\Entity\Action;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/action"), name="action_")
 * @IsGranted("ROLE_USER")
 */
class ActionController extends AbstractController
{
    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Action $action): Response
    {
        return $this->render('action/show.html.twig', [
            'action' => $action,
        ]);
    }
}
