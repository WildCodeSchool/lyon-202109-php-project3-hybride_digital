<?php

namespace App\Controller;

use App\Entity\ActionCheck;
use App\Entity\Step;
use App\Entity\StepCheck;
use App\Form\StepType;
use App\Repository\StepRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/step")
 * @IsGranted("ROLE_USER")
 */
class StepController extends AbstractController
{
    /**
     * @Route("/", name="step_index", methods={"GET"})
     */
    public function index(StepRepository $stepRepository): Response
    {
        return $this->render('step/index.html.twig', [
            'steps' => $stepRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="step_new", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $step = new Step();
        $form = $this->createForm(StepType::class, $step);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($step);
            $entityManager->flush();

            return $this->redirectToRoute('step_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('step/new.html.twig', [
            'step' => $step,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/{id}", name="step_show", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function show(Step $step): Response
    {
        return $this->render('step/show.html.twig', [
            'step' => $step,
        ]);
    }

    /**
     * @Route("/user/{id}", name="step_showUser", methods={"GET"})
     */
    public function showUser(StepCheck $stepCheck): Response
    {
        $step = $stepCheck->getStep();
        $actionChecks = $stepCheck->getActionChecks();
        $stepCheck = $stepCheck->getIsComplete();

        return $this->render('step/showUser.html.twig', [
            'step' => $step,
            'action_checks' => $actionChecks,
            'step_check' => $stepCheck,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="step_edit", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Step $step, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StepType::class, $step);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('step_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('step/edit.html.twig', [
            'step' => $step,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="step_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Step $step, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $step->getId(), (string)$request->request->get('_token'))) {
            $entityManager->remove($step);
            $entityManager->flush();
        }

        return $this->redirectToRoute('step_index', [], Response::HTTP_SEE_OTHER);
    }
}
