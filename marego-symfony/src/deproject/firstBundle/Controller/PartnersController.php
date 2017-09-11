<?php

namespace deproject\firstBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use deproject\firstBundle\Entity\Partners;
use deproject\firstBundle\Form\PartnersType;

/**
 * Partners controller.
 *
 * @Route("/partners")
 */
class PartnersController extends Controller
{

    /**
     * Lists all Partners entities.
     *
     * @Route("/", name="partners")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('deprojectfirstBundle:Partners')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Partners entity.
     *
     * @Route("/", name="partners_create")
     * @Method("POST")
     * @Template("deprojectfirstBundle:Partners:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Partners();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('partners'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Partners entity.
     *
     * @param Partners $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Partners $entity)
    {
        $form = $this->createForm(new PartnersType(), $entity, array(
            'action' => $this->generateUrl('partners_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Partners entity.
     *
     * @Route("/new", name="partners_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Partners();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Partners entity.
     *
     * @Route("/{id}", name="partners_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Partners')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partners entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Partners entity.
     *
     * @Route("/{id}/edit", name="partners_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Partners')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partners entity.');
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
    * Creates a form to edit a Partners entity.
    *
    * @param Partners $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Partners $entity)
    {
        $form = $this->createForm(new PartnersType(), $entity, array(
            'action' => $this->generateUrl('partners_update', array('id' => $entity->getPid())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Partners entity.
     *
     * @Route("/{id}", name="partners_update")
     * @Method("PUT")
     * @Template("deprojectfirstBundle:Partners:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Partners')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partners entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('partners'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Partners entity.
     *
     * @Route("/{id}", name="partners_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('deprojectfirstBundle:Partners')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Partners entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('partners'));
    }

    /**
     * Creates a form to delete a Partners entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partners_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
