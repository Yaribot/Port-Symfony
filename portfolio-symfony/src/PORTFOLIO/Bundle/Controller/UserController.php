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
use PORTFOLIO\Bundle\Entity\Experience;


use PORTFOLIO\Bundle\Form\CompetencesType;
use PORTFOLIO\Bundle\Form\FormationType;
use PORTFOLIO\Bundle\Form\HobbiesType;
use PORTFOLIO\Bundle\Form\ExperienceType;

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
 * @Route("/user/hobby/", name="user-hobby")
 */
public function UserHobbyAction()
{
    $repo = $this->getDoctrine()->getRepository(Hobbies::class);
    $hobby = $repo->findAll();
    
    
    $params = array(
        'hobby' => $hobby
    );
    
    return $this->render('@PORTFOLIO/Admin/list-hobbies.html.twig', $params);
    
}


/** 
 * @Route("/user/hobby/add", name="user-add-hobby")
 */
public function adminHobbyAddAction(Request $request)
{
    $hobby = new Hobbies;
    
    $form = $this->createForm(HobbiesType::class, $hobby);
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {
        
        $em = $this->getDoctrine()->getManager(); // On récup le manager 
        $em->persist($hobby); // On enregistre dans le systeme l'objet
        
        $em->flush();
        
        $request->getsession()->getFlashBag()->add('success', 'le hobby ' . $hobby->getIdHobbie() . ' a bien été ajouté !');
        return $this->redirectToRoute('user-hobby');
    }
    
    $params = array(
        'hobbyForm' => $form->createView(),
        'title' => 'AJOUTER UN HOBBY'
    );
    
    return $this->render('@PORTFOLIO/Admin/form-hobbies.html.twig', $params);
}


/** 
 * @Route("/user/hobby/update/{id}/", name="user-hobby-update")
 */
public function adminHobbyUpdateAction($id, Request $request)
{
    $em = $this->getDoctrine()->getManager();
    
    $hobby = $em->find(Hobbies::class,$id);
    
    $form = $this->createForm(HobbiesType::class, $hobby);
    
    $form->handleRequest($request);
    
    if($form->isSubmitted() && $form->isValid())
    {
        $em->persist($hobby);
        
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('success', 'Le hobby' . $hobby->getHbhobbie() . ' a bien été modifié !');
        return $this->redirectToRoute('user-hobby');
    }
    
    $params = array(
        'id' => $id,
        'hobbyForm' => $form->createView(),
        'title' => 'MODIFIER LE HOBBY ' . $hobby->getHbhobbie(),
    );
    
    return $this->render('@PORTFOLIO/Admin/form-hobbies.html.twig', $params);
    
}


/** 
 * @Route("/user/hobby/delete/{id}/", name="user-hobby-delete")
 */
public function adminHobbyDeleteAction($id, Request $request)
{
    $em = $this->getDoctrine()->getManager();
    
    $hobby = $em->find(Hobbies::class,$id);
    
    $em->remove($hobby);
    $em->flush();
    
    $request->getSession()->getFlashBag()->add('success', 'Le hobby N°' . $id . ' a bien été supprimé');
    
    return $this->redirectToRoute('user-hobby');
}


// ------------ END CRUD HOBBIES ----------------------



// ------------ CRUD EXPERIENCES ----------------------


/** 
 * @Route("/user/experience/", name="user-experience")
 */
public function UserExperienceAction()
{
    $repo = $this->getDoctrine()->getRepository(Experience::class);
    $experience = $repo->findAll();
    
    
    $params = array(
        'experience' => $experience
    );
    
    return $this->render('@PORTFOLIO/Admin/list-experiences.html.twig', $params);
    
}


/** 
 * @Route("/user/experience/add", name="user-add-experience")
 */
public function adminExperienceAddAction(Request $request)
{
    $experience = new Experience;
    
    $form = $this->createForm(ExperienceType::class, $experience);
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {
        
        $em = $this->getDoctrine()->getManager(); // On récup le manager 
        $em->persist($experience); // On enregistre dans le systeme l'objet
        
        $em->flush();
        
        $request->getsession()->getFlashBag()->add('success', 'le hobby ' . $experience->getIdXp() . ' a bien été ajouté !');
        return $this->redirectToRoute('user-experience');
    }
    
    $params = array(
        'experienceForm' => $form->createView(),
        'title' => 'AJOUTER UNE EXPERIENCE'
    );
    
    return $this->render('@PORTFOLIO/Admin/form-experiences.html.twig', $params);
}


/** 
 * @Route("/user/experience/update/{id}/", name="user-experience-update")
 */
public function adminExperienceUpdateAction($id, Request $request)
{
    $em = $this->getDoctrine()->getManager();
    
    $experience = $em->find(Experience::class,$id);
    
    $form = $this->createForm(ExperienceType::class, $experience);
    
    $form->handleRequest($request);
    
    if($form->isSubmitted() && $form->isValid())
    {
        $em->persist($experience);
        
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('success', 'L\' experience' . $experience->getXpemployer() . ' a bien été modifié !');
        return $this->redirectToRoute('user-experience');
    }
    
    $params = array(
        'id' => $id,
        'experienceForm' => $form->createView(),
        'title' => 'MODIFIER L\' EXPERIENCE ' . $experience->getXpemployer(),
    );
    
    return $this->render('@PORTFOLIO/Admin/form-experiences.html.twig', $params);
    
}


/** 
 * @Route("/user/experience/delete/{id}/", name="user-experience-delete")
 */
public function adminExperienceDeleteAction($id, Request $request)
{
    $em = $this->getDoctrine()->getManager();
    
    $experience = $em->find(Experience::class,$id);
    
    $em->remove($experience);
    $em->flush();
    
    $request->getSession()->getFlashBag()->add('success', 'L\' experience N°' . $id . ' a bien été supprimé');
    
    return $this->redirectToRoute('user-experience');
}

// ------------ END CRUD EXPERIENCES ------------------


/** 
 * @Route("/membre/profil/", name="profil")
 */
public function ProfilAction()
{
    $params = array();
    return $this->render('@App/Membre/profil.html.twig');
}

}