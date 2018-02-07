<?php

namespace SNT\ImmobilierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\HttpFoundation\Request;

use SNT\ImmobilierBundle\Entity\Utilisateur;
use SNT\ImmobilierBundle\Form\UtilisateurType;

class AdminController extends Controller
{
    public function addAction(Request $request)
    {

        
        $utilisateur = new Utilisateur();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $utilisateur);

        $formBuilder
        ->add('nomComplet', TextType::class)
        ->add('login',     TextType::class)
        ->add('datenais',   DateType::class)
        ->add('roles')
        ->add('save', SubmitType::class, array(
            'label'=>'Enregistrer',
            'attr'=>['class'=>'btn-success']
        ));
        $form = $formBuilder->getForm();
        $error = "";
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $repositoryUser = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SNTImmobilierBundle:Utilisateur');
            $user = $repositoryUser->findByLogin($utilisateur->getLogin());
            if($user != null){
                $error = 'un user avec ce login existe déja.';
            }
            else{
                $utilisateur->setPwd("passer");
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($utilisateur);
                    $em->flush();
                    

                    $users = $repositoryUser->findAll();
                    return $this->redirectToRoute("snt_immobilier_listusers");
                }
            }
            
        }
        return $this->render('SNTImmobilierBundle:Admin:add.html.twig', array(
            'form' => $form->createView(),'error'=>$error
        ));
    }

    public function listAction(){
        $repositoryUser = $this->getDoctrine()->getManager()
        ->getRepository('SNTImmobilierBundle:Utilisateur');
        $users = $repositoryUser->findAll();
        return $this->render('SNTImmobilierBundle:Admin:list.html.twig', array(
            'users' => $users
        ));
    }
}
