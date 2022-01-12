<?php

namespace App\Controller;

use App\Entity\Link;
use App\Entity\User;
use App\Form\LinkType;
use App\Repository\UserRepository;
use App\Form\UserType;
use App\Repository\LinkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Form\PasswordChangeType;
use App\Service\PasswordManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/profile", name="profile_")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @IsGranted("ROLE_USER")
     */
    public function index(LinkRepository $linkRepository): Response
    {
        $user = $this->getUser();

        return $this->render('customer/profile/index.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/{id}/update", name="update", methods={"GET", "POST"})
     */
    public function update(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('profile_index', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/update.html.twig', [
            'updateForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/newlinks", name="newLinks", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $links = new Link();
        $user = $this->getUser();
        if ($user instanceof User) {
            $links->setUser($user);
        }
        $form = $this->createForm(LinkType::class, $links);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($links);
            $entityManager->flush();

            return $this->redirectToRoute('profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('customer/profile/newLinks.html.twig', [
            'links' => $links,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/linkUpdate", name="linkUpdate", methods={"GET", "POST"})
     */
    public function linkUpdate(Request $request, EntityManagerInterface $entityManager): Response
    {
        $links = null;
        $user = $this->getUser();
        if ($user instanceof User) {
            $links = $user->getLinks();
        }
        $form = $this->createForm(LinkType::class, $links);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('customer/profile/updateLink.html.twig', ['updateLinkform' => $form->createView()]);
    }

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
