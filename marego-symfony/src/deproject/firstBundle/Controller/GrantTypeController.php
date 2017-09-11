<?php

namespace deproject\firstBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use deproject\firstBundle\Entity\GrantType;
use deproject\firstBundle\Form\GrantTypeType;

/**
 * GrantType controller.
 *
 * @Route("/granttype")
 */
class GrantTypeController extends Controller
{

    /**
     * Lists all GrantType entities.
     *
     * @Route("/", name="granttype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('deprojectfirstBundle:GrantType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GrantType entity.
     *
     * @Route("/", name="granttype_create")
     * @Method("POST")
     * @Template("deprojectfirstBundle:GrantType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GrantType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('granttype'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a GrantType entity.
     *
     * @param GrantType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GrantType $entity)
    {
        $form = $this->createForm(new GrantTypeType(), $entity, array(
            'action' => $this->generateUrl('granttype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GrantType entity.
     *
     * @Route("/new", name="granttype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new GrantType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a GrantType entity.
     *
     * @Route("/{id}", name="granttype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:GrantType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrantType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing GrantType entity.
     *
     * @Route("/{id}/edit", name="granttype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:GrantType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrantType entity.');
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
    * Creates a form to edit a GrantType entity.
    *
    * @param GrantType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GrantType $entity)
    {
        $form = $this->createForm(new GrantTypeType(), $entity, array(
            'action' => $this->generateUrl('granttype_update', array('id' => $entity->getGid())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GrantType entity.
     *
     * @Route("/{id}", name="granttype_update")
     * @Method("PUT")
     * @Template("deprojectfirstBundle:GrantType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:GrantType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrantType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('granttype'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a GrantType entity.
     *
     * @Route("/{id}", name="granttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('deprojectfirstBundle:GrantType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GrantType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('granttype'));
    }

    /**
     * Creates a form to delete a GrantType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('granttype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
