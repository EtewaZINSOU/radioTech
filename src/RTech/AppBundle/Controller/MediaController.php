<?php

namespace RTech\AppBundle\Controller;

use RTech\AppBundle\Form\MediaType;
use RTech\AppBundle\Entity\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MediaController extends Controller
{
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
		$media = $em->getRepository('RTechAppBundle:Media');

		$medias = $media->findBy(['user' => $this->getUser()]);
		$user = $this->getUser();


		return $this->render('RTechAppBundle:media:index.html.twig', [
			'medias' => $medias,
			'user' =>$user
		]);
	}

	
	public function addMediaAction(Request $request)
	{
		$media = new Media();
		$form = $this->createForm(MediaType::class, $media);

		if ($form->handleRequest($request)->isValid()) {

			// $file stores the uploaded PDF file
			/** @var UploadedFile $file */
			$file = $media->getEmplacement();


			// Generate a unique name for the file before saving it
			$fileName = md5(uniqid()).'.'.$file->guessExtension();

			// Move the file to the directory where brochures are stored
			$brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/media';

			$file->move($brochuresDir, $fileName);

			// Update the 'brochure' property to store the PDF file name
			// instead of its contents
			$media->setEmplacement($fileName);
			
			$media->setUser($this->getUser());

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
