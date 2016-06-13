<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use tesisControl\tesisBundle\Entity\Tesis;
use tesisControl\tesisBundle\Form\TesisType;

/**
 * Tesis controller.
 *
 * @Route("/tesis")
 */
class TesisController extends Controller
{

    /**
     * Lists all Tesis entities.
     *
     * @Route("/", name="tesis")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:Tesis')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tesis entity.
     *
     * @Route("/", name="tesis_create")
     * @Method("POST")
     * @Template("tesisControltesisBundle:Tesis:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tesis();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tesis_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Tesis entity.
     *
     * @param Tesis $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tesis $entity)
    {
        $form = $this->createForm(new TesisType(), $entity, array(
            'action' => $this->generateUrl('tesis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tesis entity.
     *
     * @Route("/new", name="tesis_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tesis();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tesis entity.
     *
     * @Route("/{id}", name="tesis_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Tesis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tesis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tesis entity.
     *
     * @Route("/{id}/edit", name="tesis_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Tesis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tesis entity.');
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
    * Creates a form to edit a Tesis entity.
    *
    * @param Tesis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tesis $entity)
    {
        $form = $this->createForm(new TesisType(), $entity, array(
            'action' => $this->generateUrl('tesis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tesis entity.
     *
     * @Route("/{id}", name="tesis_update")
     * @Method("PUT")
     * @Template("tesisControltesisBundle:Tesis:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Tesis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tesis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tesis_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tesis entity.
     *
     * @Route("/{id}", name="tesis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tesisControltesisBundle:Tesis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tesis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tesis'));
    }

    /**
     * Creates a form to delete a Tesis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tesis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
