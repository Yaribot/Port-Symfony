<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class UserController extends Controller
{
    /** 
     * @Route("/membre/inscription/", name="inscription")
     */
    public function InscriptionAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new user;

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager(); // On récup le manager 
            $em->persist($user); // On enregistre dans le systeme l'objet

            $password = $user->getPassword();
            // password saisie dans le formulaire

            $password_crypte = $encoder->encodePassword($membre, $password);
            // j'encode le password

            $user->setPassword($password_crypte);

            $user->setSalt(NULL);
            $user->setRoles(['ROLE_USER']);
            // On définit un role par défaut

            $em->flush();

            $request->getsession()->getFlashBag()->add('success', 'Félicitation ' . $user->getPrenom() . ', vous êtes bien enregisté !!');
            return $this->redirectToRoute('inscription');

        }


        $params = array(
            'userForm' => $form->createView(),
            'title' => 'INSCRIPTION'
        );
        return $this->render('@PORTFOLIO/Admin/form-connexion.html.twig', $params);
    }

    

    /** 
     * @Route("/membre/profil/", name="profil")
     */
    public function ProfilAction()
    {
        $params = array();
        return $this->render('@App/Membre/profil.html.twig');
    }

}