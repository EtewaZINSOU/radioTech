<?php

namespace RTech\AppBundle\Controller;

use RTech\AppBundle\Form\MediaType;
use RTech\AppBundle\Entity\Media;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MediaController extends Controller
{

	public function addMediaAction(Request $request)
	{
		$media = new Media();
		$form = $this->createForm(MediaType::class, $media);

		if ($form->handleRequest($request)->isValid()) {

			$em = $this->getDoctrine()->getManager();
			$em->persist($media);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Media bien enregistrée.');

			return $this->redirectToRoute('fos_user_profile_show');
		}

		return $this->render(
			'RTechAppBundle:media:addMedia.html.twig',
			[
				'form' => $form->createView(),
			]
		);
	}
}
