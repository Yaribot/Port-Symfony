<?php

namespace PORTFOLIO\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

// use PORTFOLIO\Entity\Projects;
use PORTFOLIO\Bundle\Entity\Competences;
use PORTFOLIO\Bundle\Entity\Formation;
use PORTFOLIO\Bundle\Entity\Experience;
use PORTFOLIO\Bundle\Entity\Hobbies;
use PORTFOLIO\Bundle\Entity\Contacts;
use PORTFOLIO\Bundle\Entity\Language;
use PORTFOLIO\Bundle\Entity\Projects;
use PORTFOLIO\Bundle\Entity\User;


// use PORTFOLIO\Entity\User;
use PORTFOLIO\Form\UserType;
use PORTFOLIO\Bundle\Form\ContactsType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render('@PORTFOLIO/Default/index.html.twig');
    }

    /**
     * @Route("/admin/", name="admin")
     */
    public function adminAction()
    {
        // $auth = $this->get('security.authentication_utils');

        // $UserPseudo = $auth->getUserPseudo();
        // // Récupérer le pseudo tapé...

        // $error = $auth-> getLastAuthenticationError();
        // // Récupérer l'erreur si il y en a une

        // if(!empty($error))
        // {
        //     $request->getSession()->getFlashBag()->add('errors', 'Erreur d\'identifiant ! ');
        // }

        // $auth = $this->get('security.authentication_utils');

        // $UserPassword = $auth->getUserPassword();
        // // Récupérer le pseudo tapé...

        // $error = $auth-> getLastAuthenticationError();
        // // Récupérer l'erreur si il y en a une

        // if(!empty($error))
        // {
        //     $request->getSession()->getFlashBag()->add('errors', 'Erreur de mot de passe ! ');
        // }


        // $params = array(
        //     'UserPseudo' => $UserPseudo,
        //     'UserPassword' => $UserPassword
        // );


        

        // $user = new User;

        // $form = $this->createForm(UserType::class, $user);

        // $form->handleRequest($request);

        // $params = array(
        //     'UserForm' => $form->createView()           
        // );
      
        // return $this->render('@PORTFOLIO/Admin/form-connexion.html.twig', $params);
    }

    /**
     * @Route("/travaux/", name="travaux")
     */
    public function travauxAction()
    {
        return $this->render('@PORTFOLIO/Default/travaux.html.twig');
    }

    /**
     * @Route("/experience/", name="experience")
     */
    public function experienceAction()
    {

        $experience = new Experience;
        $repo = $this->getDoctrine()->getRepository(Experience::class);
        $experience = $repo->findAll();

        
        $params = array(
            'experience' => $experience
        );

        return $this->render('@PORTFOLIO/Default/experiences.html.twig', $params);
    }

    /**
     * @Route("/formation/", name="formation")
     */
    public function formationAction()
    {
        $formation = new Formation;
        $repo = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $repo->findAll();

        
        $params = array(
            'formation' => $formation
        );

        return $this->render('@PORTFOLIO/Default/formations.html.twig', $params);
    }

    /**
     * @Route("/competence/", name="competence")
     */
    public function competencesAction()
    {
        // 1 : Récupérer les infos
        $competences = new Competences;
        $repo = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repo->findAll();

        
        $params = array(
            'competences' => $competences
        );
        

        return $this->render('@PORTFOLIO/Default/competences.html.twig', $params);
    }

    /**
     * @Route("/contact/", name="contact")
     */
    public function contactAction(Request $request)
    {
        $contacts = new Contacts;

        $form = $this->createForm(ContactsType::class, $contacts);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager(); // On récup le manager 
            $em->persist($contacts); // On enregistre dans le systeme l'objet

            $em->flush();

            $request->getsession()->getFlashBag()->add('success', 'Merci ' . $contacts->getPrenom() . ', Je vous répondrai dans les plus brefs délais !');
            return $this->redirectToRoute('contact');

        }


        $params = array(
            'contactForm' => $form->createView(),
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'title' => 'CONTACTS'
        );

        return $this->render('@PORTFOLIO/Default/contact.html.twig', $params);
    }

    /**
     * @Route("/hobby/", name="hobby")
     */
    public function hobbyAction()
    {
        $hobby = new Hobbies;
        $repo = $this->getDoctrine()->getRepository(Hobbies::class);
        $hobby = $repo->findAll();

        
        $params = array(
            'hobby' => $hobby
        );

        return $this->render('@PORTFOLIO/Default/hobbies.html.twig', $params);
    }
}
