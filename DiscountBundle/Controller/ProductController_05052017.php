<?php

namespace DiscountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DiscountBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{

    /**
     * @Route("/product/", name="show_All")
     * affiche les produits crées dans la BDD
     */
    public function showAllAction()
    {

        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('DiscountBundle:Product')->findAll();


        return $this->render('DiscountBundle:Default:products.html.twig',[
            "products" => $products
        ]);
    }

    /**
     * @Route("/product/{productId}", name="discount_editProduct", requirements={"productId": "\d+"})
     * modifie les produits crées dans la BDD
     */
    public function editFormAction($productId, Request $request){

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('DiscountBundle:Product')->findOneById($productId);

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if(($product->getDiscountType()) == '0'){
                $product->setNewPrice(($product->getCurrentPrice()) - ($product->getDiscountValue()));
            }


            if(($product->getDiscountType()) == '1'){
                $result = $product->getCurrentPrice() - (($product->getCurrentPrice()) * ($product->getDiscountValue()/100));
                $product->setNewPrice($result);

            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush($product);

            return $this->redirectToRoute('show_All');
        }


         return $this->render('DiscountBundle:Default:product.html.twig',[
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }


    



}
