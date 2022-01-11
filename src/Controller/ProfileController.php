<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\PasswordChangeType;
use App\Service\PasswordManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile", name="profile_")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/password", name="password")
     */
    public function changePassword(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        PasswordManager $passwordManager
    ): Response {
        $user = $this->getUser();

        if ($user && ($user instanceof User)) {
            $form = $this->createForm(PasswordChangeType::class);
            $form->handleRequest($request);

            if (
                $form->isSubmitted() &&
                $form->isValid() &&
                is_array($request->get('password_change'))
            ) {
                $currentGivenPassword = $request->get('password_change')['currentPassword'];

                if ($userPasswordHasher->isPasswordValid($user, $currentGivenPassword)) {
                    $newPassword = $request->get('password_change')['newPassword'];
                    $newPasswordConfirm = $request->get('password_change')['newPasswordConfirm'];

                    if (
                        $passwordManager->isPasswordValid(
                            $currentGivenPassword,
                            $newPassword,
                            $newPasswordConfirm
                        )
                    ) {
                        $user->setPassword(
                            $userPasswordHasher->hashPassword(
                                $user,
                                $newPassword
                            )
                        );
                        $user->setFirstConnection(true);
                        $entityManager->persist($user);
                        $entityManager->flush();

                        $this->addFlash('success', "Votre mot de passe a été changé avec succès!");
                    }
                }
            }

            return $this->render('security/passwordUpdate.html.twig', [
                'form' => $form->createView(),
            ]);
        }
        return $this->redirectToRoute('app_login');
    }
}
