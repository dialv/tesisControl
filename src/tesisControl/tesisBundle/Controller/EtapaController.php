<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use tesisControl\tesisBundle\Entity\Etapa;
use tesisControl\tesisBundle\Form\EtapaType;

/**
 * Etapa controller.
 *
 */
class EtapaController extends Controller
{

    /**
     * Lists all Etapa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tesisControltesisBundle:Etapa')->findAll();

        return $this->render('tesisControltesisBundle:Etapa:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Etapa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Etapa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etapa_show', array('id' => $entity->getId())));
        }

        return $this->render('tesisControltesisBundle:Etapa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Etapa entity.
     *
     * @param Etapa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Etapa $entity)
    {
        $form = $this->createForm(new EtapaType(), $entity, array(
            'action' => $this->generateUrl('etapa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Etapa entity.
     *
     */
    public function newAction()
    {
        $entity = new Etapa();
        $form   = $this->createCreateForm($entity);

        return $this->render('tesisControltesisBundle:Etapa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etapa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Etapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etapa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('tesisControltesisBundle:Etapa:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etapa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Etapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etapa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('tesisControltesisBundle:Etapa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Etapa entity.
    *
    * @param Etapa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Etapa $entity)
    {
        $form = $this->createForm(new EtapaType(), $entity, array(
            'action' => $this->generateUrl('etapa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Etapa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tesisControltesisBundle:Etapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etapa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etapa_edit', array('id' => $id)));
        }

        return $this->render('tesisControltesisBundle:Etapa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Etapa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tesisControltesisBundle:Etapa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Etapa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etapa'));
    }

    /**
     * Creates a form to delete a Etapa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etapa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
