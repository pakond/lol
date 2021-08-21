<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    public function fetchGitHubInformation(): array
    {
        $response = $this->client->request(
            'GET',
            //'http://ddragon.leagueoflegends.com/cdn/11.15.1/data/en_US/champion/Morgana.json'
			'http://ddragon.leagueoflegends.com/cdn/11.15.1/data/en_US/champion.json'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }

    public function createChampion($value): String {

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)

        //$respuesta = $this->fetchGitHubInformation();

        $champion = new Champion();
		$champion->setVersion($value['version']);
		$champion->setNameid($value['id']);
        $champion->setKeyid($value['key']);
        $champion->setName($value['name']);
        $champion->setTitle($value['title']);
		
		$image = new Image();
		$image->setFull($value['image']['full']);
		$image->setSprite($value['image']['sprite']);
		$image->setImggroup($value['image']['group']);
		$image->setX($value['image']['x']);
		$image->setY($value['image']['y']);
		$image->setW($value['image']['w']);
		$image->setH($value['image']['h']);
		$champion->setImage($image);
		
		$stats = new Stats();
		/*$stats->setHp($this->respuesta['data']['Morgana']['stats']['hp']);
		$stats->setHpperlevel($this->respuesta['data']['Morgana']['stats']['hpperlevel']);
		$stats->setMp($this->respuesta['data']['Morgana']['stats']['mp']);
		$stats->setMpperlevel($this->respuesta['data']['Morgana']['stats']['mpperlevel']);
		$stats->setMovespeed($this->respuesta['data']['Morgana']['stats']['movespeed']);
		$stats->setArmor($this->respuesta['data']['Morgana']['stats']['armor']);
		$stats->setArmorperlevel($this->respuesta['data']['Morgana']['stats']['armorperlevel']);
		$stats->setSpellblock($this->respuesta['data']['Morgana']['stats']['spellblock']);
		$stats->setSpellblockperlevel($this->respuesta['data']['Morgana']['stats']['spellblockperlevel']);
		$stats->setAttackrange($this->respuesta['data']['Morgana']['stats']['attackrange']);
		$stats->setHpregen($this->respuesta['data']['Morgana']['stats']['hpregen']);
		$stats->setHpregenperlevel($this->respuesta['data']['Morgana']['stats']['hpregenperlevel']);
		$stats->setMpregen($this->respuesta['data']['Morgana']['stats']['mpregen']);
		$stats->setMpregenperlevel($this->respuesta['data']['Morgana']['stats']['mpregenperlevel']);
		$stats->setCrit($this->respuesta['data']['Morgana']['stats']['crit']);
		$stats->setCritperlevel($this->respuesta['data']['Morgana']['stats']['critperlevel']);
		$stats->setAttackdamage($this->respuesta['data']['Morgana']['stats']['attackdamage']);
		$stats->setAttackdamageperlevel($this->respuesta['data']['Morgana']['stats']['attackdamageperlevel']);
		$stats->setAttackspeedperlevel($this->respuesta['data']['Morgana']['stats']['attackspeedperlevel']);
		$stats->setAttackspeed($this->respuesta['data']['Morgana']['stats']['attackspeed']);*/
		
		$stats->setHp($value['stats']['hp']);
		$stats->setHpperlevel($value['stats']['hpperlevel']);
		$stats->setMp($value['stats']['mp']);
		$stats->setMpperlevel($value['stats']['mpperlevel']);
		$stats->setMovespeed($value['stats']['movespeed']);
		$stats->setArmor($value['stats']['armor']);
		$stats->setArmorperlevel($value['stats']['armorperlevel']);
		$stats->setSpellblock($value['stats']['spellblock']);
		$stats->setSpellblockperlevel($value['stats']['spellblockperlevel']);
		$stats->setAttackrange($value['stats']['attackrange']);
		$stats->setHpregen($value['stats']['hpregen']);
		$stats->setHpregenperlevel($value['stats']['hpregenperlevel']);
		$stats->setMpregen($value['stats']['mpregen']);
		$stats->setMpregenperlevel($value['stats']['mpregenperlevel']);
		$stats->setCrit($value['stats']['crit']);
		$stats->setCritperlevel($value['stats']['critperlevel']);
		$stats->setAttackdamage($value['stats']['attackdamage']);
		$stats->setAttackdamageperlevel($value['stats']['attackdamageperlevel']);
		$stats->setAttackspeedperlevel($value['stats']['attackspeedperlevel']);
		$stats->setAttackspeed($value['stats']['attackspeed']);
		$champion->setStats($stats);
		
		//$champion->setLore($value['lore']);
		$champion->setLore('Probando...');
        $champion->setBlurb($value['blurb']);
		
		// tell Doctrine you want to (eventually) save the Product (no queries yet)
        //$this->entityManager->persist($image);
		
		// actually executes the queries (i.e. the INSERT query)
        //$this->entityManager->flush();
		
		// tell Doctrine you want to (eventually) save the Product (no queries yet)
        //$this->entityManager->persist($stats);
		
		// actually executes the queries (i.e. the INSERT query)
        //$this->entityManager->flush();

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $this->entityManager->persist($champion);

        // actually executes the queries (i.e. the INSERT query)
        $this->entityManager->flush();

        return 'Saved new champion with id '.$champion->getId();
    }
	
	public function getChampionAllytips(): Array {
		
		$nameId='Morgana';
		$champion=$this->entityManager->getRepository(Champion::class)->findByNameId($nameId);
		$allytips=$champion->getAllytips();
		
		//return 'sin datos';
		return $allytips;
	}
	
    #[Route('/champion', name: 'champion')]
    public function index(): Response {
		$this->entityManager = $this->getDoctrine()->getManager();
		$texto = $this->getChampionAllytips();
		
		return $this->json([
			'message' => $texto,
			'path' => 'src/Controller/ChampionController.php',
		]);
    }
	
	#[Route('/champion/{nameId}', name: 'champion/{nameId}')]
    public function detail($nameId): Response {
		$this->entityManager = $this->getDoctrine()->getManager();
		$champion=$this->entityManager->getRepository(Champion::class)->findByNameId($nameId);
		$texto = $champion->getAllytips();
		
		return $this->json([
			'message' => $texto,
			'path' => 'src/Controller/ChampionController.php',
		]);
    }
	
	#[Route('/champions', name: 'champions')]
    public function allChampions(): Response {
		$this->entityManager = $this->getDoctrine()->getManager();
		$champions=$this->entityManager->getRepository(Champion::class)->findAll();
		$champion=$champions[0];
		$texto='NameId: '.$champion->getNameid();
		$texto=$texto.', KeyId: '.$champion->getKeyid();
		$texto=$texto.', Name: '.$champion->getName();
		$texto=$texto.', Title: '.$champion->getTitle();
		
		return $this->json([
			'message' => $texto,
			'path' => 'src/Controller/ChampionController.php',
		]);
    }
}
