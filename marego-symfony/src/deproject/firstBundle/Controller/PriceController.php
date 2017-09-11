<?php


namespace deproject\firstBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use deproject\firstBundle\Entity\Price;
use deproject\firstBundle\Form\PriceType;

/**
 * Price controller.
 *
 * @Route("/price")
 */
class PriceController extends Controller
{

    /**
     * Lists all Tickets entities.
     *
     * @Route("/", name="price")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('deprojectfirstBundle:Price')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tickets entity.
     *
     * @Route("/", name="price_create")
     * @Method("POST")
     * @Template("deprojectfirstBundle:Price:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Price();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('price'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Tickets entity.
     *
     * @param Tickets $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Price $entity)
    {
        $form = $this->createForm(new PriceType(), $entity, array(
            'action' => $this->generateUrl('price_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tickets entity.
     *
     * @Route("/new", name="price_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Price();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tickets entity.
     *
     * @Route("/{id}", name="price_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Price')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tickets entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tickets entity.
     *
     * @Route("/edit/{id}/{category}", name="price_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id,$category)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Price')->findOneBy(array('ticketid'=>$id,'categoryid'=>$category));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tickets entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id,$category);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Tickets entity.
    *
    * @param Tickets $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Price $entity)
    {
        $form = $this->createForm(new PriceType(), $entity, array(
            'action' => $this->generateUrl('price_update', array('id' => $entity->getTicketid()->getTid(),'category' => $entity->getCategoryid()->getCid())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tickets entity.
     *
     * @Route("/{id}/{category}", name="price_update")
     * @Method("PUT")
     * @Template("deprojectbundleBundle:Price:edit.html.twig")
     */
    public function updateAction(Request $request, $id,$category)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Price')->find(array('ticketid'=>$id,'categoryid'=>$category));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tickets entity.');
        }

        $deleteForm = $this->createDeleteForm($id,$category);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('price'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tickets entity.
     *
     * @Route("/{id}/{category}", name="price_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id,$category)
    {
        $form = $this->createDeleteForm($id,$category);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('deprojectfirstBundle:Price')->find(array('ticketid'=>$id,'categoryid'=>$category));

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tickets entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('price'));
    }

    /**
     * Creates a form to delete a Tickets entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id,$category)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('price_delete', array('id' => $id,'category'=> $category)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
