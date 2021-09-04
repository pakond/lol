<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// use Symfony\Component\Serializer\Encoder\JsonEncoder;
// use Symfony\Component\Serializer\Encoder\XmlEncoder;
// use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
// use Symfony\Component\Serializer\Serializer;

// $encoders = [new XmlEncoder(), new JsonEncoder()];
// $normalizers = [new ObjectNormalizer()];
// $serializer = new Serializer($normalizers, $encoders);

use App\Entity\Champion;
use App\Entity\Image;
use App\Entity\Stats;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class ChampionController extends AbstractController
{

    private $client;
	private $entityManager;
	private $respuesta;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
	
	// public function getChampionAllytips(): Array {
		
	// 	$nameId='Morgana';
	// 	$champion=$this->entityManager->getRepository(Champion::class)->findByNameId($nameId);
	// 	$allytips=$champion->getAllytips();
		
	// 	//return 'sin datos';
	// 	return $allytips;
	// }
	
    // #[Route('/champion', name: 'champion')]
    // public function index(): Response {
	// 	$this->entityManager = $this->getDoctrine()->getManager();
	// 	$texto = $this->getChampionAllytips();
		
	// 	return $this->json([
	// 		'message' => $texto,
	// 		'path' => 'src/Controller/ChampionController.php',
	// 	]);
    // }
	
	// #[Route('/champion/{nameId}', name: 'champion/{nameId}')]
    // public function detail($nameId): Response {
	// 	$this->entityManager = $this->getDoctrine()->getManager();
	// 	$champion=$this->entityManager->getRepository(Champion::class)->findByNameId($nameId);
	// 	$texto = $champion->getAllytips();
		
	// 	return $this->json([
	// 		'message' => $texto,
	// 		'path' => 'src/Controller/ChampionController.php',
	// 	]);
    // }
	
	#[Route('/champions', name: 'getChampions')]
    public function getChampions(): Response {
		$this->entityManager = $this->getDoctrine()->getManager();
		//$champions=$this->entityManager->getRepository(Champion::class)->findAll();
		$champions=$this->entityManager->getRepository(Champion::class)->findAllJSON();


		$arrayChampions = [];

		//foreach($champions as $champion) {
			//$dataChampion = 'Name: ' .$champion->getNameid() .' Id: '.$champion->getKeyid();
			//array_push($arrayChampions, {'Name' => $champion->getNameid(), 'Id' => $champion->getKeyid());
			//array_push($arrayChampions, $champion->toString());
		//}

		// $texto='NameId: '.$champion->getNameid();
		// $texto=$texto.', KeyId: '.$champion->getKeyid();
		// $texto=$texto.', Name: '.$champion->getName();
		// $texto=$texto.', Title: '.$champion->getTitle();

		return $this->json($champions);

		// return new Response($this->serializer->serialize($champions, 'json'));
		//return new Response($arrayChampions);
		
		// return $this->json([
		// 	'message' => $arrayChampions,
		// 	'path' => 'src/Controller/ChampionController.php',
		// ]);
    }
}
