<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use tesisControl\tesisBundle\Entity\TesisEstado;
use tesisControl\tesisBundle\Form\TesisEstadoType;

/**
 * TesisEstado controller.
 *
 */
class TesisEstadoController extends Controller
{

    /**
     * Lists all TesisEstado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:TesisEstado')->findAll();

        return $this->render('tesisControltesisBundle:TesisEstado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TesisEstado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TesisEstado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tesisestado_show', array('id' => $entity->getId())));
        }

        return $this->render('tesisControltesisBundle:TesisEstado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TesisEstado entity.
     *
     * @param TesisEstado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TesisEstado $entity)
    {
        $form = $this->createForm(new TesisEstadoType(), $entity, array(
            'action' => $this->generateUrl('tesisestado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TesisEstado entity.
     *
     */
    public function newAction()
    {
        $entity = new TesisEstado();
        $form   = $this->createCreateForm($entity);

        return $this->render('tesisControltesisBundle:TesisEstado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TesisEstado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:TesisEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TesisEstado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('tesisControltesisBundle:TesisEstado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TesisEstado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:TesisEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TesisEstado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('tesisControltesisBundle:TesisEstado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TesisEstado entity.
    *
    * @param TesisEstado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TesisEstado $entity)
    {
        $form = $this->createForm(new TesisEstadoType(), $entity, array(
            'action' => $this->generateUrl('tesisestado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TesisEstado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:TesisEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TesisEstado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tesisestado_edit', array('id' => $id)));
        }

        return $this->render('tesisControltesisBundle:TesisEstado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TesisEstado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tesisControltesisBundle:TesisEstado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TesisEstado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tesisestado'));
    }

    /**
     * Creates a form to delete a TesisEstado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tesisestado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
