<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use tesisControl\tesisBundle\Entity\Tribunal;
use tesisControl\tesisBundle\Form\TribunalType;

/**
 * Tribunal controller.
 *
 * @Route("/tribunal")
 */
class TribunalController extends Controller
{

    /**
     * Lists all Tribunal entities.
     *
     * @Route("/", name="tribunal")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:Tribunal')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tribunal entity.
     *
     * @Route("/", name="tribunal_create")
     * @Method("POST")
     * @Template("tesisControltesisBundle:Tribunal:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tribunal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tribunal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Tribunal entity.
     *
     * @param Tribunal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tribunal $entity)
    {
        $form = $this->createForm(new TribunalType(), $entity, array(
            'action' => $this->generateUrl('tribunal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tribunal entity.
     *
     * @Route("/new", name="tribunal_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tribunal();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tribunal entity.
     *
     * @Route("/{id}", name="tribunal_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Tribunal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tribunal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tribunal entity.
     *
     * @Route("/{id}/edit", name="tribunal_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Tribunal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tribunal entity.');
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
    * Creates a form to edit a Tribunal entity.
    *
    * @param Tribunal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tribunal $entity)
    {
        $form = $this->createForm(new TribunalType(), $entity, array(
            'action' => $this->generateUrl('tribunal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tribunal entity.
     *
     * @Route("/{id}", name="tribunal_update")
     * @Method("PUT")
     * @Template("tesisControltesisBundle:Tribunal:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Tribunal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tribunal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tribunal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tribunal entity.
     *
     * @Route("/{id}", name="tribunal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tesisControltesisBundle:Tribunal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tribunal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tribunal'));
    }

    /**
     * Creates a form to delete a Tribunal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tribunal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
