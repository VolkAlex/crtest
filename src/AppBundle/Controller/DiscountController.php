<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Discount;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Discount controller.
 *
 * @Route("discount")
 */
class DiscountController extends Controller
{
    /**
     * Lists all discount entities.
     *
     * @Route("/", name="discount_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $discounts = $em->getRepository('AppBundle:Discount')->findAll();

        return $this->render('discount/index.html.twig', array(
            'discounts' => $discounts,
        ));
    }

    /**
     * Creates a new discount entity.
     *
     * @Route("/new", name="discount_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $discount = new Discount();
        $form = $this->createForm('AppBundle\Form\DiscountType', $discount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discount);
            $em->flush();

            return $this->redirectToRoute('discount_show', array('id' => $discount->getId()));
        }

        return $this->render('discount/new.html.twig', array(
            'discount' => $discount,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a discount entity.
     *
     * @Route("/{id}", name="discount_show")
     * @Method("GET")
     */
    public function showAction(Discount $discount)
    {
        $deleteForm = $this->createDeleteForm($discount);

        return $this->render('discount/show.html.twig', array(
            'discount' => $discount,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing discount entity.
     *
     * @Route("/{id}/edit", name="discount_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Discount $discount)
    {
        $deleteForm = $this->createDeleteForm($discount);
        $editForm = $this->createForm('AppBundle\Form\DiscountType', $discount);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('discount_edit', array('id' => $discount->getId()));
        }

        return $this->render('discount/edit.html.twig', array(
            'discount' => $discount,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a discount entity.
     *
     * @Route("/{id}", name="discount_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Discount $discount)
    {
        $form = $this->createDeleteForm($discount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($discount);
            $em->flush();
        }

        return $this->redirectToRoute('discount_index');
    }

    /**
     * Creates a form to delete a discount entity.
     *
     * @param Discount $discount The discount entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Discount $discount)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discount_delete', array('id' => $discount->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
