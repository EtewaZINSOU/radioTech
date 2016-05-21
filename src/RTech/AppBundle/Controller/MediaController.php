<?php

namespace RTech\AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use RTech\AppBundle\Form\MediaType;
use RTech\AppBundle\Entity\Media;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MediaController extends Controller
{
	public function indexAction(Request $request)
	{
		$media = new Media();
		$form = $this->createForm(MediaType::class, $media);

        return $this->render('RTechAppBundle:Default:media.html.twig', array(
        		'form' => $form->createView(),
        	));
	}
}
