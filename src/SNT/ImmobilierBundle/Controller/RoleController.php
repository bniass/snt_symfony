<?php

namespace SNT\ImmobilierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RoleController extends Controller
{
    /**
     * @Route("/immobilier/role/add")
     */
    public function addAction()
    {
        return $this->render('SNTImmobilierBundle:Role:add.html.twig', array(
            // ...
        ));
    }

}
