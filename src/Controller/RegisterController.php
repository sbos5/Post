<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    { $user = new User();
       

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
          if ($form->isSubmitted() ) {
       
        $data = $form->getData();
        $user->setPassword($encoder->encodePassword($user,($data->getPassword())));
         $user->setEmail($data->getEmail());
         $user->setRoles(['ROLE_USER']);
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($user);
          $entityManager->flush();

        return $this->redirectToRoute('app_login');
    }

        return $this->render('register_controler/register.html.twig', [
            'form' => $form->createView(),
        ]);
        
        
    }
}


