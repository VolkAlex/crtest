<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.07.2020
 * Time: 20:09
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Order;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Order controller.
 *
 * @Route("order")
 */
class OrderController extends Controller
{
    /**
     * Index of order form.
     *
     * @Route("/", name="order_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render('order/index.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     * Calculate discount
     *
     * @Route("/calculate", name="order_discount")
     * @Method("POST")
     */
    public function calculateAction(Request $orderRequest)
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('AppBundle:Discount');
        $discounts = $repository->getAll();

        $orderParams = $orderRequest->request->all();

        $order = new Order($orderParams);

        $discount = $order->getDiscount($discounts);

        return new Response( $discount );
    }
}