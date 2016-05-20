<?php

namespace RTech\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RTechUserBundle:Default:index.html.twig');
    }
}
