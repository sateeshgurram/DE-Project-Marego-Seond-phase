<?php

namespace deproject\firstBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use deproject\firstBundle\Entity\marego_symfony;
use deproject\firstBundle\Form\marego_symfonyType;

/**
 * marego_symfony controller.
 *
 * @Route("/marego_symfony")
 */
class marego_symfonyController extends Controller
{

    /**
     * Lists all marego_symfony entities.
     *
     * @Route("/", name="marego_symfony")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('deprojectfirstBundle:marego_symfony')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new marego_symfony entity.
     *
     * @Route("/", name="marego_symfony_create")
     * @Method("POST")
     * @Template("deprojectfirstBundle:marego_symfony:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new marego_symfony();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('marego_symfony_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a marego_symfony entity.
     *
     * @param marego_symfony $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(marego_symfony $entity)
    {
        $form = $this->createForm(new marego_symfonyType(), $entity, array(
            'action' => $this->generateUrl('marego_symfony_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new marego_symfony entity.
     *
     * @Route("/new", name="marego_symfony_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new marego_symfony();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a marego_symfony entity.
     *
     * @Route("/{id}", name="marego_symfony_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:marego_symfony')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find marego_symfony entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing marego_symfony entity.
     *
     * @Route("/{id}/edit", name="marego_symfony_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:marego_symfony')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find marego_symfony entity.');
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
    * Creates a form to edit a marego_symfony entity.
    *
    * @param marego_symfony $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(marego_symfony $entity)
    {
        $form = $this->createForm(new marego_symfonyType(), $entity, array(
            'action' => $this->generateUrl('marego_symfony_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing marego_symfony entity.
     *
     * @Route("/{id}", name="marego_symfony_update")
     * @Method("PUT")
     * @Template("deprojectfirstBundle:marego_symfony:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:marego_symfony')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find marego_symfony entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('marego_symfony_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a marego_symfony entity.
     *
     * @Route("/{id}", name="marego_symfony_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('deprojectfirstBundle:marego_symfony')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find marego_symfony entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('marego_symfony'));
    }

    /**
     * Creates a form to delete a marego_symfony entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marego_symfony_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
