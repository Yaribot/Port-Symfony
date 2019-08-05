<?php

namespace PORTFOLIO\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use PORTFOLIO\Entity\User;
use PORTFOLIO\Form\UserType;

use PORTFOLIO\Bundle\Entity\Competences;
use PORTFOLIO\Bundle\Entity\Formation;
use PORTFOLIO\Bundle\Entity\Hobbies;


use PORTFOLIO\Bundle\Form\CompetencesType;
use PORTFOLIO\Bundle\Form\FormationType;
use PORTFOLIO\Bundle\Form\HobbiesType;

class UserController extends Controller
{

// ------------ CRUD COMPETENCES ----------------------

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

            $request->getsession()->getFlashBag()->add('success', 'la compétence ' . $competence->getIdCompetence() . ' a bien été ajouté !');
            return $this->redirectToRoute('user-competence');
        }

        $params = array(
            'competencesForm' => $form->createView(),
            'title' => 'AJOUTER UNE COMPETENCE'
        );

        return $this->render('@PORTFOLIO/Admin/form-competence.html.twig', $params);
    }

    /** 
     * @Route("/user/competence/update/{id}/", name="user-competence-update")
     */
    public function adminCompetenceUpdateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $competence = $em->find(Competences::class,$id);

        $form = $this->createForm(CompetencesType::class, $competence);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($competence);

            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La compétence' . $competence->getCptechnology() . ' a bien été modifiée !');
            return $this->redirectToRoute('user-competence');
        }

        $params = array(
            'id' => $id,
            'competencesForm' => $form->createView(),
            'title' => 'MODIFIER LA COMPETENCE ' . $competence->getCptechnology(),
        );

        return $this->render('@PORTFOLIO/Admin/form-competence.html.twig', $params);

    }

    /** 
     * @Route("/user/competence/delete/{id}/", name="user-competence-delete")
     */
    public function adminCompetenceDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $competence = $em->find(Competences::class,$id);

        $em->remove($competence);
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'La compétence N°' . $id . ' a bien été supprimé');

        return $this->redirectToRoute('user-competence');
    }

// ------------ CRUD FORMATION ----------------------

/** 
 * @Route("/user/formation/", name="user-formation")
 */
public function UserFormationAction()
{
    $repo = $this->getDoctrine()->getRepository(Formation::class);
    $formation = $repo->findAll();
    
    
    $params = array(
        'formation' => $formation
    );
    
    return $this->render('@PORTFOLIO/Admin/list-formation.html.twig', $params);
    
}

/** 
 * @Route("/user/formation/add", name="user-add-formation")
 */
public function adminFormationAddAction(Request $request)
{
    $formation = new Formation;
    
    $form = $this->createForm(FormationType::class, $formation);
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {
        
        $em = $this->getDoctrine()->getManager(); // On récup le manager 
        $em->persist($formation); // On enregistre dans le systeme l'objet
        
        $em->flush();
        
        $request->getsession()->getFlashBag()->add('success', 'la formation ' . $formation->getIdFormation() . ' a bien été ajouté !');
        return $this->redirectToRoute('user-formation');
    }
    
    $params = array(
        'formationForm' => $form->createView(),
        'title' => 'AJOUTER UNE FORMATION'
    );
    
    return $this->render('@PORTFOLIO/Admin/form-formation.html.twig', $params);
}

/** 
 * @Route("/user/formation/update/{id}/", name="user-formation-update")
 */
public function adminFormationUpdateAction($id, Request $request)
{
    $em = $this->getDoctrine()->getManager();
    
    $formation = $em->find(Formation::class,$id);
    
    $form = $this->createForm(FormationType::class, $formation);
    
    $form->handleRequest($request);
    
    if($form->isSubmitted() && $form->isValid())
    {
        $em->persist($formation);
        
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('success', 'La formation' . $formation->getFormtitre() . ' a bien été modifiée !');
        return $this->redirectToRoute('user-formation');
    }
    
    $params = array(
        'id' => $id,
        'formationForm' => $form->createView(),
        'title' => 'MODIFIER LA FORMATION ' . $formation->getFormtitre(),
    );
    
    return $this->render('@PORTFOLIO/Admin/form-formation.html.twig', $params);
    
}

/** 
 * @Route("/user/formation/delete/{id}/", name="user-formation-delete")
 */
public function adminFormationDeleteAction($id, Request $request)
{
    $em = $this->getDoctrine()->getManager();
    
    $formation = $em->find(Formation::class,$id);
    
    $em->remove($formation);
    $em->flush();
    
    $request->getSession()->getFlashBag()->add('success', 'La formation N°' . $id . ' a bien été supprimé');
    
    return $this->redirectToRoute('user-formation');
}

// ------------ END CRUD FORMATION ------------------



// ------------ CRUD HOBBIES ----------------------

/** 
 * @Route("/user/Hobby/", name="user-hobby")
 */
public function UserHobbyAction()
{
    $repo = $this->getDoctrine()->getRepository(Hobbies::class);
    $hobby = $repo->findAll();
    
    
    $params = array(
        'hobby' => $hobby
    );
    
    return $this->render('@PORTFOLIO/Admin/list-Hobbies.html.twig', $params);
    
}


// ------------ END CRUD HOBBIES ----------------------


/** 
 * @Route("/membre/profil/", name="profil")
 */
public function ProfilAction()
{
    $params = array();
    return $this->render('@App/Membre/profil.html.twig');
}

}