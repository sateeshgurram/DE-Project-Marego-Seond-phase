<?php

namespace deproject\firstBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use deproject\firstBundle\Entity\PriceCategory;
use deproject\firstBundle\Form\PriceCategoryType;

/**
 * PriceCategory controller.
 *
 * @Route("/pricecategory")
 */
class PriceCategoryController extends Controller
{

    /**
     * Lists all PriceCategory entities.
     *
     * @Route("/", name="pricecategory")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('deprojectfirstBundle:PriceCategory')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PriceCategory entity.
     *
     * @Route("/", name="pricecategory_create")
     * @Method("POST")
     * @Template("deprojectfirstBundle:PriceCategory:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PriceCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pricecategory'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a PriceCategory entity.
     *
     * @param PriceCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PriceCategory $entity)
    {
        $form = $this->createForm(new PriceCategoryType(), $entity, array(
            'action' => $this->generateUrl('pricecategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PriceCategory entity.
     *
     * @Route("/new", name="pricecategory_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PriceCategory();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PriceCategory entity.
     *
     * @Route("/{id}", name="pricecategory_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:PriceCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PriceCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    } 

    /**
     * Displays a form to edit an existing PriceCategory entity.
     *
     * @Route("/{id}/edit", name="pricecategory_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:PriceCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PriceCategory entity.');
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
    * Creates a form to edit a PriceCategory entity.
    *
    * @param PriceCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PriceCategory $entity)
    {
        $form = $this->createForm(new PriceCategoryType(), $entity, array(
            'action' => $this->generateUrl('pricecategory_update', array('id' => $entity->getCid())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PriceCategory entity.
     *
     * @Route("/{id}", name="pricecategory_update")
     * @Method("PUT")
     * @Template("deprojectfirstBundle:PriceCategory:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:PriceCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PriceCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pricecategory'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PriceCategory entity.
     *
     * @Route("/{id}", name="pricecategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('deprojectfirstBundle:PriceCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PriceCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pricecategory'));
    }

    /**
     * Creates a form to delete a PriceCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pricecategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
