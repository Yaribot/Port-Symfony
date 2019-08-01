<?php

namespace PORTFOLIO\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use PORTFOLIO\Entity\User;
use PORTFOLIO\Form\UserType;

use PORTFOLIO\Bundle\Entity\Competences;

use PORTFOLIO\Bundle\Form\CompetencesType;

class UserController extends Controller
{
    /** 
     * @Route("/user/competence/", name="user-competence")
     */
    public function UserCompetenceAction()
    {
        $repo = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repo->findAll();


        $params = array(
            'competences' => $competences
        );
      
        return $this->render('@PORTFOLIO/Admin/list-competence.html.twig', $params);

    }

    /** 
     * @Route("/user/competence/add", name="user-add-competence")
     */
    public function adminCompetenceAddAction(Request $request)
    {
        $competence = new Competences;

        $form = $this->createForm(CompetencesType::class, $competence);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager(); // On récup le manager 
            $em->persist($competence); // On enregistre dans le systeme l'objet

            $em->flush();

            $request->getsession()->getFlashBag()->add('success', 'la compétence ' . $competence->getId() . ' a bien été ajouté !');
            return $this->redirectToRoute('user-competence');
        }

        $params = array(
            'competencesForm' => $form->createView(),
            'title' => 'AJOUTER UNE COMPETENCE'
        );

        return $this->render('@PORTFOLIO/Admin/form-competence.html.twig', $params);
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