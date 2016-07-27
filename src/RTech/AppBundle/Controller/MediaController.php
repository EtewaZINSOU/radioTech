<?php
namespace RTech\AppBundle\Controller;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\Match;
use Elastica\Query\MatchAll;
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


		return $this->render('RTechAppBundle:media:index.html.twig', [
			'medias' => $medias,
			'user' => $this->getUser()
		]);
	}

	/**
	 * @param $querystring
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function searchMediaAction($querystring)
	{
		$finder = $this->container->get('fos_elastica.finder.rtech.media');

		if (!empty($querystring)) {
			$boolQuery = new BoolQuery();
			$fieldQuery = new Match();
			dump($fieldQuery);
			$fieldQuery->setFieldQuery('name', $querystring);
			$boolQuery->addShould($fieldQuery);
		}
		else {
			$boolQuery = new MatchAll();
		}


		$data = $finder->find($boolQuery);

		//$result = $data->getResults();
dump($data);


		return $this->render('RTechAppBundle:media:search.html.twig', [
			'querystring' => $querystring,
			'data' => $data,
			//'resultat' => $result
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

		// 2) handle the submit (will only happen on POST)
		$form->handleRequest($request);

		if($request->isXmlHttpRequest()){

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

				$mediaModal = $this->render('RTechAppBundle:media:addMedia.html.twig', [
						'form' => $form->createView(),
					])->getContent();

				// add flash messages

				$this->addFlash(
					'successMessage',
					'Votre message a bien été envoyé'
				);

				$response = new JsonResponse();

				$response->setStatusCode(200);


				$response->setData([
					'data'=> 'Votre son a bien été ajouté',
					'media' => $mediaModal
				]);

				return $response;
			}
		}

		return $this->render(
			'RTechAppBundle:media:addMedia.html.twig',
			[
				'form' => $form->createView(),
			]
		);
	}


	/**
	 * @param Media $media
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function deleteAction(Media $media)
	{
		$this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access this page!');


		if($this->getUser() != $media->getUser()){
			throw $this->createNotFoundException("You don't authorized to delete this media");
		}else{
			if (!$media) {
				throw $this->createNotFoundException('No media found for id '.$media );
			}

			$em = $this->getDoctrine()->getManager();
			$em->remove($media);
			$em->flush();

			return $this->redirectToRoute('fos_user_profile_show');
		}

	}
}
