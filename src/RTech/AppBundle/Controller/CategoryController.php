<?php

namespace RTech\AppBundle\Controller;

use RTech\AppBundle\Form\MediaType;
use RTech\AppBundle\Entity\Media;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render(
            'RTechAppBundle:category:category.html.twig'
        );
    }
}
