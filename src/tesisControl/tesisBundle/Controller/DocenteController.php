<?php

namespace tesisControl\tesisBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use tesisControl\tesisBundle\Entity\Docente;

/**
 * Docente controller.
 *
 * @Route("/docente")
 */
class DocenteController extends Controller
{

    /**
     * Lists all Docente entities.
     *
     * @Route("/", name="docente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:Docente')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Docente entity.
     *
     * @Route("/{id}", name="docente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Docente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Docente entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
