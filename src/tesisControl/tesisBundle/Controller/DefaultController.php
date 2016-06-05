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
    
    public function loginAction()
    {
        $user = 'username';
        $password = 'password';
        $em = $this ->getDoctrine()->getEntityManager();
        $repository = $em ->getRepository('tesisControltesisBundle:Usuario');
        $user = $repository ->findOneBy(array('id'=>$user,'clave'=>$password));
        if($user){
            return $this->render('tesisControltesisBundle:Default:index.html.twig');
        }else
        {
            return $this->render('tesisControltesisBundle:Default:login.html.twig');
        }
    }
   
}
