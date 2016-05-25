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

    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('RTechAppBundle:Category')->byCategorie($slug);

        if(!$category){
            throw $this->createNotFoundException('Impossible d\'afficher les media de la catégories démandées');
        }

        return $this->render('RTechAppBundle:Category:show.html.twig', array(
            'category'=>$category,
        ));
    }


    public function getAllMediaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mediasAll = $em->getRepository('RTechAppBundle:Media')->findAll();
        
        return $this->render('RTechAppBundle:Category:category.html.twig', [
            'mediasAll' => $mediasAll,
        ]);
    }
    
}