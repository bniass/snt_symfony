<?php

namespace SNT\ImmobilierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SNTImmobilierBundle:Default:index.html.twig', array('nom'=>'Baye Niass'));
    }
}
