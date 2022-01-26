<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\ActionCheck;
use App\Form\IsActionCompleteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/action"), name="action_")
 * @IsGranted("ROLE_USER")
 */
class ActionController extends AbstractController
{
    /**
     * @Route("/{id}", name="showUser", methods={"GET", "POST"})
     */
    public function showUser(
        Action $action,
        ActionCheck $actionCheck,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $action = $actionCheck->getAction();

        $form = $this->createForm(IsActionCompleteType::class, $actionCheck);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form['isComplete']) {
                $actionCheck->setIsComplete(true);
            } else {
                $actionCheck->setIsComplete(false);
            }
            $entityManager->flush();

            return $this->redirectToRoute('customer_home');
        }
        return $this->render('action/show.html.twig', [
            'action' => $action,
            'form' => $form->createView()
        ]);
    }
}
