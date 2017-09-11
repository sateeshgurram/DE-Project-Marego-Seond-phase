<?php

namespace deproject\firstBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use deproject\firstBundle\Entity\Soldtickets;
use deproject\firstBundle\Form\SoldticketsType;
use deproject\firstBundle\Entity\Tickets;
use deproject\firstBundle\Entity\PriceCategory;
use deproject\firstBundle\Entity\GrantType;
use deproject\firstBundle\Entity\Partners;
use deproject\firstBundle\Entity\Price;

/**
 * Tickets controller.
 *
 * @Route("/soldtickets")
 */
class SoldticketsController extends Controller
{

    /**
     * Lists all Tickets entities.
     *
     * @Route("/", name="soldtickets")
     * @Method("GET")
     * @Template()
     */
	
	
    public function indexAction()
    {
    	
        $em = $this->getDoctrine()->getManager();
        
     

        $entities = $em->getRepository('deprojectfirstBundle:Soldtickets')->findAll();

        foreach ($entities as $entity) {
        	
        	$price = $em->getRepository('deprojectfirstBundle:Price')->findOneBy(array('ticketid' =>$entity->getTicket(),'categoryid' =>$entity->getcategory()));
        	
        	echo $entity->setPrice($price->getPriceperticket());
        }
        
        return array(
            'entities' => $entities
        );
    }
    /**
     * Creates a new Tickets entity.
     *
     * @Route("/", name="soldtickets_create")
     * @Method("POST")
     * @Template("deprojectfirstBundle:Soldtickets:new.html.twig")
     */
    public function createAction(Request $request)
    {
    	
        $entity =  new Soldtickets();
 		
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
         
            return $this->redirect($this->generateUrl('soldtickets'));
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
    private function createCreateForm(Soldtickets $entity)
    {
        $form = $this->createForm(new SoldticketsType(), $entity, array(
            'action' => $this->generateUrl('soldtickets_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tickets entity.
     *
     * @Route("/new", name="soldtickets_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
   
    	$entity = new Soldtickets();
    	$form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tickets entity.
     *
     * @Route("/edit/{id}/{ticket}/{category}/{granttype}/{partner}", name="soldtickets_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id,$ticket,$category,$granttype,$partner)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Soldtickets')->findOneBy(Array('date'=>$id, 'ticket' =>$ticket,'category' => $category,'granttype' => $granttype,'partner'=>$partner));


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id,$ticket,$category,$granttype,$partner);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Finds and displays a Tickets entity.
     *
     * @Route("show/{id}/{ticket}/{category}/{granttype}/{partner}", name="soldtickets_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id,$ticket,$category,$granttype,$partner)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('deprojectfirstBundle:Soldtickets')->findOneBy(Array('date'=>$id, 'ticket' =>$ticket,'category' => $category,'granttype' => $granttype,'partner'=>$partner));
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find Tickets entity.');
    	}
    
    	$deleteForm = $this->createDeleteForm($id,$ticket,$category,$granttype,$partner);
    
    	return array(
    			'entity'      => $entity,
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
    private function createEditForm(Soldtickets $entity)
    {
        $form = $this->createForm(new SoldticketsType(), $entity, array(
            'action' => $this->generateUrl('soldtickets_update', array('id' => $entity->getdate(),'ticket' => $entity->getTicket()->getTid(),'category' => $entity->getcategory()->getCid(),'granttype' => $entity->getgrantType()->getGid(),'partner' => $entity->getpartner()->getPid())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tickets entity.
     *
     * @Route("/{id}/{ticket}/{category}/{granttype}/{partner}", name="soldtickets_update")
     * @Method("PUT")
     * @Template("deprojectfirstBundle:Soldtickets:edit.html.twig")
     */
    public function updateAction(Request $request, $id,$ticket,$category,$granttype,$partner)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('deprojectfirstBundle:Soldtickets')->find(array('date' =>$id, 'ticket' => $ticket,'category' =>$category ,'granttype' =>$granttype ,'partner' =>$partner));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity from update section');
        }

        $deleteForm = $this->createDeleteForm($id,$ticket,$category,$granttype,$partner);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('soldtickets'));
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
     * @Route("/{id}/{ticket}/{category}/{granttype}/{partner}", name="soldtickets_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id,$ticket,$category,$granttype,$partner)
    {
        $form = $this->createDeleteForm($id,$ticket,$category,$granttype,$partner);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('deprojectfirstBundle:Soldtickets')->find(array('date' =>$id, 'ticket' => $ticket,'category' =>$category ,'granttype' =>$granttype ,'partner' =>$partner));

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tickets entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('soldtickets'));
    }

    /**
     * Creates a form to delete a Tickets entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id,$ticket,$category,$granttype,$partner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soldtickets_delete', array('id' => $id,'ticket' => $ticket,'category' =>$category ,'granttype' =>$granttype ,'partner' =>$partner)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
