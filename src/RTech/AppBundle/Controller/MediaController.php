<?php
namespace RTech\AppBundle\Controller;

use RTech\AppBundle\Form\MediaType;
use RTech\AppBundle\Entity\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MediaController extends Controller
{
	/**
	 * Permet d'afficher les medias ou son en fonction de l'utilisateur
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
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

	/**
	 * Permet d'ajouter un son par upload de fichier
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function addMediaAction(Request $request)
	{
		// 1) build the form
		$media = new Media();
		$form = $this->createForm(MediaType::class, $media);

		//dump($form->getErrors());

		// 2) handle the submit (will only happen on POST)
		$form->handleRequest($request);

		//dump($request->isXmlHttpRequest());

		//if($request->isXmlHttpRequest()){
			dump($form->isSubmitted(),$form);
			if ($form->isSubmitted() && $form->isValid()) {

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
				$media->setPublishedDate(new \DateTime());

				$em = $this->getDoctrine()->getManager();
				$em->persist($media);
				$em->flush();

				$response = new JsonResponse();
				$response->setStatusCode(200);
				//ajout de données éventuelles
				$response->setData(array(
					'successMessage' => "Votre message a bien été envoyé pommmm"));
				return $response;

				//return $this->redirectToRoute('fos_user_profile_show');
			}
		//}

		return $this->render(
			'RTechAppBundle:media:addMedia.html.twig',
			[
				'form' => $form->createView(),
			]
		);
	}



	/**
	 * @param Request $request
	 * @param $id
	 * @return JsonResponse
	 */
	public function deleteAction(Request $request, $id)
	{

			if (!$id) {
				return new JsonResponse(array('data' => 'id not found'));
			}

			$em = $this->getDoctrine()->getManager();
			$media = $em->getRepository('RTechAppBundle:Media')->find($id);
			$em->remove($media);
			$em->flush();

			return $this->redirectToRoute('fos_user_profile_show');
		
		

	}
}
