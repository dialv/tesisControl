<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use tesisControl\tesisBundle\Entity\Notas;
use tesisControl\tesisBundle\Form\NotasType;

/**
 * Notas controller.
 *
 * @Route("/notas")
 */
class NotasController extends Controller
{

    /**
     * Lists all Notas entities.
     *
     * @Route("/", name="notas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:Notas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Notas entity.
     *
     * @Route("/", name="notas_create")
     * @Method("POST")
     * @Template("tesisControltesisBundle:Notas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Notas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('notas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Notas entity.
     *
     * @param Notas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Notas $entity)
    {
        $form = $this->createForm(new NotasType(), $entity, array(
            'action' => $this->generateUrl('notas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Notas entity.
     *
     * @Route("/new", name="notas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Notas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Notas entity.
     *
     * @Route("/{id}", name="notas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Notas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Notas entity.
     *
     * @Route("/{id}/edit", name="notas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Notas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notas entity.');
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
    * Creates a form to edit a Notas entity.
    *
    * @param Notas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Notas $entity)
    {
        $form = $this->createForm(new NotasType(), $entity, array(
            'action' => $this->generateUrl('notas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Notas entity.
     *
     * @Route("/{id}", name="notas_update")
     * @Method("PUT")
     * @Template("tesisControltesisBundle:Notas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Notas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('notas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Notas entity.
     *
     * @Route("/{id}", name="notas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tesisControltesisBundle:Notas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notas'));
    }

    /**
     * Creates a form to delete a Notas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
