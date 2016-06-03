<?php

namespace tesisControl\tesisBundle\Controller;
use  Sensio \Bundle\FrameworkExtraBundle\Configuration\Route ; 
use  Sensio \Bundle\FrameworkExtraBundle\Configuration\Template ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
     /**
     * @Route("/",name="minsalacademicaan_homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
