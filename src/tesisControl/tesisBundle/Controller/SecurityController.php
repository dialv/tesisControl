<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Security controller.
 *
 * @Route("/admin")
 */
class SecurityController extends Controller {

    /**
     * Definimos las rutas para el login:
     * @Route("/login", name="login")
     * @Route("/login_check", name="login_check")
     */
    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();
// obtiene el error de inicio de sesión si lo hay
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('tesisControltesisBundle:Security:login.html.twig', array(
//        return $this->render('tesisControltesisBundle:Default:login.html.twig', array(
// el último nombre de usuario ingresado por el usuario
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
        ));
    }

    /**
     * @Route("/login_check", name="_demo_security_check")
     */
    public function securityCheckAction()
    {
        if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
              return $this->render('tesisControltesisBundle:Default:welcome.html.twig', array('Bienvenido'));
     }
     else {
        return $this->render('tesisControltesisBundle:Security:login.html.twig', array(

// el último nombre de usuario ingresado por el usuario

                    'name' => 'login error'
        ));
     }
    }

    
    /**
     * Definimos las rutas para el logout:
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {
        $this->get("request")->getSession()->invalidate();
$this->get("security.context")->setToken(null);
        return $this->render('tesisControltesisBundle:Default:login.html.twig', array(
// el último nombre de usuario ingresado por el usuario
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'name' => 'erorr',
        ));
    }

}
