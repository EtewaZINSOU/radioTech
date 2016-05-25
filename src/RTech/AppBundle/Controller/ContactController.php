<?php

namespace RTech\AppBundle\Controller;

use RTech\AppBundle\Form\MediaType;
use RTech\AppBundle\Entity\Media;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{

    public function indexAction()
    {
        return $this->render('RTechAppBundle:Contact:index.html.twig');
    }
}