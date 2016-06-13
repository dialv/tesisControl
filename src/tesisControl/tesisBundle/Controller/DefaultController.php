<?php

namespace tesisControl\tesisBundle\Controller;

use Sensio \Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio \Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use tesisControl\tesisBundle\Modals\Login;
use tesisControl\tesisBundle\Entity\Usuario;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('tesisControltesisBundle:Usuario');
        if ($request->getMethod() == 'POST') {
            $session->clear();
            $username = $request->get('username');
            $password = sha1($request->get('password'));
            $remember = $request->get('remember');
           $user = $repository->findOneBy(array('id' => $username, 'clave' => $password));
            if ($user) {
                if ($remember == 'remember-me') {
                    $login = new Login();
                    $login->setUsername($username);
                    $login->setPassword($password);
                    $session->set('login', $login);
                }
                return $this->render('tesisControltesisBundle:Default:welcome.html.twig', array(
                    'name' => $user->getId(),
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                ));
            } else {
                return $this->render('tesisControltesisBundle:Default:login.html.twig', array('name' => 'Login Error'));
            }
        } else {
            if ($session->has('login')) {
                $login = $session->get('login');
                $username = $login->getUsername();
                $password = $login->getPassword();
                $user = $repository->findOneBy(array('id' => $username, 'clave' => $password));
                if ($user) {
                    return $this->render('tesisControltesisBundle:Default:welcome.html.twig', array('name' => $user->getId()));
                }
            }
            return $this->render('tesisControltesisBundle:Default:login.html.twig');
        }
    }

   

      public function inicioAction(Request $request)
      {
          
                return $this->render('tesisControltesisBundle:Default:welcome.html.twig');
              
            }
    
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
 
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
 
        return $this->render('tesisControltesisBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

      
    public function logoutAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $session->clear();
        return $this->render('tesisControltesisBundle:Default:login.html.twig');
    }

    public function signupAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $username = $request->get('username');
            $password = $request->get('password');

            $user = new Usuario();
            $user->setClave(sha1($password));
            $user->setId($username);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('tesisControltesisBundle:Default:signup.html.twig');
    }


}
