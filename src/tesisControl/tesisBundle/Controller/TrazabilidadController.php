<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use tesisControl\tesisBundle\Entity\Trazabilidad;
use tesisControl\tesisBundle\Form\TrazabilidadType;

/**
 * Trazabilidad controller.
 *
 * @Route("/trazabilidad")
 */
class TrazabilidadController extends Controller
{

    /**
     * Lists all Trazabilidad entities.
     *
     * @Route("/", name="trazabilidad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:Trazabilidad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Trazabilidad entity.
     *
     * @Route("/", name="trazabilidad_create")
     * @Method("POST")
     * @Template("tesisControltesisBundle:Trazabilidad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Trazabilidad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trazabilidad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Trazabilidad entity.
     *
     * @param Trazabilidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Trazabilidad $entity)
    {
        $form = $this->createForm(new TrazabilidadType(), $entity, array(
            'action' => $this->generateUrl('trazabilidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Trazabilidad entity.
     *
     * @Route("/new", name="trazabilidad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Trazabilidad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Trazabilidad entity.
     *
     * @Route("/{id}", name="trazabilidad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Trazabilidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trazabilidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Trazabilidad entity.
     *
     * @Route("/{id}/edit", name="trazabilidad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Trazabilidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trazabilidad entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Trazabilidad entity.
    *
    * @param Trazabilidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Trazabilidad $entity)
    {
        $form = $this->createForm(new TrazabilidadType(), $entity, array(
            'action' => $this->generateUrl('trazabilidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Trazabilidad entity.
     *
     * @Route("/{id}", name="trazabilidad_update")
     * @Method("PUT")
     * @Template("tesisControltesisBundle:Trazabilidad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Trazabilidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trazabilidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('trazabilidad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Trazabilidad entity.
     *
     * @Route("/{id}", name="trazabilidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tesisControltesisBundle:Trazabilidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trazabilidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trazabilidad'));
    }

    /**
     * Creates a form to delete a Trazabilidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trazabilidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
