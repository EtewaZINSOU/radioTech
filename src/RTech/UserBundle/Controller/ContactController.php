<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 04/02/2016
 * Time: 10:05
 */

namespace RTech\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ContactController extends Controller
{

    public function indexAction()
    {
        return $this->render('RTechUserBundle:Contact:index.html.twig');
    }
}