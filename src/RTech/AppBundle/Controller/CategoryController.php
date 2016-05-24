<?php
namespace RTech\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Affiche tous les categories 
     * @return Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $categories = $em->getRepository('RTechAppBundle:Category')->findAll();

        return $this->render('RTechAppBundle:Category:category_list.html.twig', 
            array(
                'categories'=>$categories,
        ));
    }
    
}