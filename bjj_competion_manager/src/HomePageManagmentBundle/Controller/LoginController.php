<?php

namespace HomePageManagmentBundle\Controller;

use HomePageManagmentBundle\Entity\User;
use HomePageManagmentBundle\Form\RegisterType;
use HomePageManagmentBundle\Service\TokenGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * @Route("", name="show_homepage", methods={"GET"})
     */
    public function showHomePageAction()
    {
        return new Response("<html><body>Witam</body>");
    }

    /**
     * @Route("/login/", name="show_login_form", methods={"GET"})
     */
    public function showLoginPageAction()
    {
        //Walidacja: tutaj warunek sprawdzajacy czy user jest zalogowany, jesli tak wiadomosc, jesli nie formularz

    }

    /**
     * @Route("/register/", name="show_register_form", methods={"GET"})
     */
    public function showRegisterPageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usersRepo = $em->getRepository("HomePageManagmentBundle:User");

        $form = $this->createForm(RegisterType::class, new User);

        return $this->render("form.html.twig", ['form' => $form->createView()]);
    }

    /**
     * @Route("/register/", name="register_user", methods={"POST"})
     * @param Request $request
     * @param TokenGenerator $tokenGenerator
     * @return Response
     */
    public function registerUserAction(Request $request, TokenGenerator $tokenGenerator)
    {
        $em = $this->getDoctrine()->getManager();
        $usersRepo = $em->getRepository("HomePageManagmentBundle:User");
        $user = new User();

        var_dump($tokenGenerator->createToken());
        $form = $this->createForm(RegisterType::class, new User);

        if ($form->isValid() && $form->isSubmitted())
        {
            $user->setLogin($request->request->get('register')['login']);
            $user->setEmail($request->request->get('register')['email']);
            $user->setPassword(password_hash($request->request->get('register')['password'],PASSWORD_BCRYPT));
            $user->setActivationToken($tokenGenerator->getHappyMessage());
            $user->setActivationStatus(false);
            $user->setRole('User');
            $em->persist($user);
            $em->flush();
        }

        return new Response("<html><body>Witam</body>");
    }
}
