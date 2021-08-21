<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Contracts\HttpClient\HttpClientInterface;

// use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;

use App\Entity\Import;
use App\Entity\Language;
use App\Entity\Champion;
use App\Entity\LanguageChampion;
use App\Entity\LanguageChampionSkin;
use App\Entity\Image;
use App\Entity\Skin;
use App\Entity\Info;
use App\Entity\Stats;
use App\Entity\Spell;

class ImportController extends AbstractController
{
    private $client;
	private $entityManager;
	private $respuesta;
	private $import;
	private $version;
	private $language;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchGitHubInformation($version): array
    {
        $response = $this->client->request(
            'GET',
			//'http://ddragon.leagueoflegends.com/cdn/11.15.1/data/en_US/champion.json'
			'http://ddragon.leagueoflegends.com/cdn/' .$version. '/data/en_US/champion.json'
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

	public function fetchLanguageInformation(): array
	{
		$response = $this->client->request(
            'GET',
			'https://ddragon.leagueoflegends.com/cdn/languages.json'
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

	public function fetchVersionInformation(): array
    {
        $response = $this->client->request(
            'GET',
			'https://ddragon.leagueoflegends.com/api/versions.json'
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
	
	public function fetchChampionInformation($version,$language,$championname): array
    {
        $response = $this->client->request(
            'GET',
			'http://ddragon.leagueoflegends.com/cdn/' .$version. '/data/' .$language. '/champion/' .$championname. '.json'
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
	
	public function checkChampion($nameId): ?Champion {
		
		//$nameid = $this->respuesta['data']['Morgana']['id'];
		//$champion = $this->entityManager->getRepository(Champion::class)->findByNameId($nameid);
		//$champion = $this->entityManager->getRepository(Champion::class)->findByNameId('Garius');
		$champion = $this->entityManager->getRepository(Champion::class)->findByNameId($nameId);
		
		return $champion;
	}

    public function createChampion($value,$nameId): String {

        $champion = new Champion();
		$champion->setVersion($value['version']);
		$champion->setNameid($value['data'][$nameId]['id']);
        $champion->setKeyid($value['data'][$nameId]['key']);
        $champion->setName($value['data'][$nameId]['name']);
        //$champion->setTitle($value['data'][$nameId]['title']);
		

		//IMAGE
		$image = new Image();
		$image->setFull($value['data'][$nameId]['image']['full']);
		$image->setSprite($value['data'][$nameId]['image']['sprite']);
		$image->setImggroup($value['data'][$nameId]['image']['group']);
		$image->setX($value['data'][$nameId]['image']['x']);
		$image->setY($value['data'][$nameId]['image']['y']);
		$image->setW($value['data'][$nameId]['image']['w']);
		$image->setH($value['data'][$nameId]['image']['h']);
		$champion->setImage($image);

		//SKINS e
		// foreach ($value['data'][$nameId]['skins'] as $skinValue) {
		// 	$skin = new Skin();
		// 	$skin->setIdnum($skinValue['id']);
		// 	$skin->setNum($skinValue['num']);
		// 	$skin->setChromas($skinValue['chromas']);
		// 	$skin->setIdChampion($champion);
		// 	$this->entityManager->persist($skin);
		// 	//$champion->addSkin($skin);
		// }

		//$champion->setLore($value['data'][$nameId]['lore']);
        //$champion->setBlurb($value['data'][$nameId]['blurb']);
		//$champion->setAllytips($value['data'][$nameId]['allytips']);
		//$champion->setEnemytips($value['data'][$nameId]['enemytips']);
		$champion->setTags($value['data'][$nameId]['tags']);
		//$champion->setPartype($value['data'][$nameId]['partype']);
		
		//INFO
		$info = new Info();
		$info->setAttack($value['data'][$nameId]['info']['attack']);
		$info->setDefense($value['data'][$nameId]['info']['defense']);
		$info->setMagic($value['data'][$nameId]['info']['magic']);
		$info->setDifficulty($value['data'][$nameId]['info']['difficulty']);
		$champion->setInfo($info);

		//STATS
		$stats = new Stats();
		$stats->setHp($value['data'][$nameId]['stats']['hp']);
		$stats->setHpperlevel($value['data'][$nameId]['stats']['hpperlevel']);
		$stats->setMp($value['data'][$nameId]['stats']['mp']);
		$stats->setMpperlevel($value['data'][$nameId]['stats']['mpperlevel']);
		$stats->setMovespeed($value['data'][$nameId]['stats']['movespeed']);
		$stats->setArmor($value['data'][$nameId]['stats']['armor']);
		$stats->setArmorperlevel($value['data'][$nameId]['stats']['armorperlevel']);
		$stats->setSpellblock($value['data'][$nameId]['stats']['spellblock']);
		$stats->setSpellblockperlevel($value['data'][$nameId]['stats']['spellblockperlevel']);
		$stats->setAttackrange($value['data'][$nameId]['stats']['attackrange']);
		$stats->setHpregen($value['data'][$nameId]['stats']['hpregen']);
		$stats->setHpregenperlevel($value['data'][$nameId]['stats']['hpregenperlevel']);
		$stats->setMpregen($value['data'][$nameId]['stats']['mpregen']);
		$stats->setMpregenperlevel($value['data'][$nameId]['stats']['mpregenperlevel']);
		$stats->setCrit($value['data'][$nameId]['stats']['crit']);
		$stats->setCritperlevel($value['data'][$nameId]['stats']['critperlevel']);
		$stats->setAttackdamage($value['data'][$nameId]['stats']['attackdamage']);
		$stats->setAttackdamageperlevel($value['data'][$nameId]['stats']['attackdamageperlevel']);
		$stats->setAttackspeedperlevel($value['data'][$nameId]['stats']['attackspeedperlevel']);
		$stats->setAttackspeed($value['data'][$nameId]['stats']['attackspeed']);
		$champion->setStats($stats);
		
		//SPELL
		foreach ($value['data'][$nameId]['spells'] as $spellValue) {
			$spell = new Spell();
			$spell->setNameid($spellValue['id']);
			$spell->setName($spellValue['name']);
			$spell->setDescription($spellValue['description']);
			$spell->setTooltip($spellValue['tooltip']);
			$spell->setMaxrank($spellValue['maxrank']);
			$spell->setCooldown($spellValue['cooldown']);
			$spell->setCooldownburn($spellValue['cooldownBurn']);
			$spell->setCost($spellValue['cost']);
			$spell->setCostburn($spellValue['costBurn']);
			$spell->setEffectburn($spellValue['effectBurn']);
			$spell->setCosttype($spellValue['costType']);
			$spell->setMaxammo($spellValue['maxammo']);
			$spell->setRange($spellValue['range']);
			$spell->setRangeburn($spellValue['rangeBurn']);
			
			try {
				$resource = '';
				//$resource = $spellValue['resource'];
				
				if (array_key_exists('resource',$spellValue)) {
					$resource = $spellValue['resource'];
				}
				
				$spell->setResource($resource);
				
			} catch (Exception $e) {
				//return 'Error en spellId: ' . $spellValue['id'];
				throw new HttpException(400, 'Invalid JSON body!');
			}
			
			$this->entityManager->persist($spell);
			//$champion->addSpell($spell);
		}

		// tell Doctrine you want to (eventually) save the Product (no queries yet)
        $this->entityManager->persist($champion);
		
		// Consultamos todos los idiomas de BBDD
		$languagesBBDD = $this->entityManager->getRepository(Language::class)->findAllLimit();
		//$languagesBBDD = $this->entityManager->getRepository(Language::class)->findAllFav();
		
		// Recorremos los idiomas
		foreach ($languagesBBDD as $languageBBDD) {
			$languageCode = $languageBBDD->getCode();
			
			if ($languageCode !== 'id_ID') {
				$champion_value = $this->fetchChampionInformation($this->version,$languageCode,$nameId);
			
				$languageChampion = new LanguageChampion();
				$languageChampion->setLanguage($languageBBDD);
				$languageChampion->setChampion($champion);
				$languageChampion->setTitle($champion_value['data'][$nameId]['title']);
				$languageChampion->setLore($champion_value['data'][$nameId]['lore']);
				$languageChampion->setBlurb($champion_value['data'][$nameId]['blurb']);
				$languageChampion->setAllytips($champion_value['data'][$nameId]['allytips']);
				$languageChampion->setEnemytips($champion_value['data'][$nameId]['enemytips']);
				$languageChampion->setPartype($champion_value['data'][$nameId]['partype']);
				
				$this->entityManager->persist($languageChampion);
				
				//LANGUAGECHAMPIONSKIN
				foreach ($value['data'][$nameId]['skins'] as $skinValue) {
					$languageChampionSkin = new LanguageChampionSkin();
					$languageChampionSkin->setLanguage($languageBBDD);	
					$languageChampionSkin->setChampion($champion);
					//$skin = $this->entityManager->getRepository(Skin::class)->findOneByNumIdChampionId($skinValue['id'],$champion->getId());
					//$skin = $this->entityManager->getRepository(Skin::class)->findOneByNumIdChampionId('266000',1);
					$skin = new skin();
					$skin->setIdnum($skinValue['id']);
					$skin->setNum($skinValue['num']);
					$skin->setChromas($skinValue['chromas']);
					$skin->setIdChampion($champion);
					$this->entityManager->persist($skin);
					$languageChampionSkin->setSkin($skin);
					$languageChampionSkin->setName($skinValue['name']);
					$this->entityManager->persist($languageChampionSkin);
				}
			}
		}
		
        // actually executes the queries (i.e. the INSERT query)
        $this->entityManager->flush();

        return 'Saved new champion with id '.$champion->getId();
    }
	
	public function updateChampion($champion,$value): String {
		//['data'][$value['id']]
		$nameid = $champion->getNameid();
		
		$champion->setVersion($value['version']);
		$champion->setNameid($value['data'][$nameid]['id']);
        $champion->setKeyid($value['data'][$nameid]['key']);
        $champion->setName($value['data'][$nameid]['name']);
        $champion->setTitle($value['data'][$nameid]['title']);
		
		$image = $champion->getImage();
		$image->setFull($value['data'][$nameid]['image']['full']);
		$image->setSprite($value['data'][$nameid]['image']['sprite']);
		$image->setImggroup($value['data'][$nameid]['image']['group']);
		$image->setX($value['data'][$nameid]['image']['x']);
		$image->setY($value['data'][$nameid]['image']['y']);
		$image->setW($value['data'][$nameid]['image']['w']);
		$image->setH($value['data'][$nameid]['image']['h']);
		$champion->setImage($image);
		
		$stats = $champion->getStats();
		$stats->setHp($value['data'][$nameid]['stats']['hp']);
		$stats->setHpperlevel($value['data'][$nameid]['stats']['hpperlevel']);
		$stats->setMp($value['data'][$nameid]['stats']['mp']);
		$stats->setMpperlevel($value['data'][$nameid]['stats']['mpperlevel']);
		$stats->setMovespeed($value['data'][$nameid]['stats']['movespeed']);
		$stats->setArmor($value['data'][$nameid]['stats']['armor']);
		$stats->setArmorperlevel($value['data'][$nameid]['stats']['armorperlevel']);
		$stats->setSpellblock($value['data'][$nameid]['stats']['spellblock']);
		$stats->setSpellblockperlevel($value['data'][$nameid]['stats']['spellblockperlevel']);
		$stats->setAttackrange($value['data'][$nameid]['stats']['attackrange']);
		$stats->setHpregen($value['data'][$nameid]['stats']['hpregen']);
		$stats->setHpregenperlevel($value['data'][$nameid]['stats']['hpregenperlevel']);
		$stats->setMpregen($value['data'][$nameid]['stats']['mpregen']);
		$stats->setMpregenperlevel($value['data'][$nameid]['stats']['mpregenperlevel']);
		$stats->setCrit($value['data'][$nameid]['stats']['crit']);
		$stats->setCritperlevel($value['data'][$nameid]['stats']['critperlevel']);
		$stats->setAttackdamage($value['data'][$nameid]['stats']['attackdamage']);
		$stats->setAttackdamageperlevel($value['data'][$nameid]['stats']['attackdamageperlevel']);
		$stats->setAttackspeedperlevel($value['data'][$nameid]['stats']['attackspeedperlevel']);
		$stats->setAttackspeed($value['data'][$nameid]	['stats']['attackspeed']);
		$champion->setStats($stats);
		
		$this->entityManager->persist($champion);
		$this->entityManager->flush();
		
		return 'Updated champion with id '.$champion->getId();
	}
	
	public function getLastVersion(): String {
		// Leemos el json de versiones
		$this->respuesta = $this->fetchVersionInformation();
		
		// Devolvemos la última versión
		return $this->respuesta[0];
	}
	
	public function checkVersion($versionJson): ?String {
		
		$import = $this->entityManager->getRepository(Import::class)->findLastVersion();
		$versionBBDD = null;
		$this->version = $versionJson;
		
		if ($import) {
			$versionBBDD = $import->getVersion();
			$this->version = $versionBBDD;
		}
		
		// Devolvemos la última versión de BBDD
		return $versionBBDD;
	}

	public function getLanguages(): ?Array {
		// Leemos el json de idiomas
		$this->respuesta = $this->fetchLanguageInformation();
		
		// Devolvemos la última versión
		return $this->respuesta;
	}

	public function checkLanguages($languagesJson): bool {
		
		$result = true;
		$languagesBBDD = $this->entityManager->getRepository(Language::class)->findAll();
		
		if (count($languagesJson) == count($languagesBBDD)) {
			$result = false;
		}
		
		return $result;
	}

	public function importChampions(): String {
		
		// Consultamos la última versión del Json
		$versionJson = $this->getLastVersion();
		
		// Consultamos la última versión de BBDD
		$versionBBDD = $this->checkVersion($versionJson);
		
		if ($versionBBDD !== null and $versionJson == $versionBBDD) {
			return 'Esta version ya la tenemos.';
		}
		
		$import = new Import();
		$import->setVersion($versionJson);
		$datetime = new \DateTime('@'.strtotime('now'));
		$import->setStartDate($datetime);
		
		$inserts = 0;
		$updates = 0;
		
		//$this->respuesta = $this->fetchGitHubInformation();
		$this->respuesta = $this->fetchGitHubInformation($this->version);
		
		foreach ($this->respuesta['data'] as $value) {
			
			$champion = $this->checkChampion($value['id']);
			$champion_value = $this->fetchChampionInformation($versionJson,'en_US',$value['id']);
			
			if ($champion) {
				if ($champion->getVersion() != $champion_value['version']) {
					$response = $this->updateChampion($champion,$champion_value);
					$updates += 1;
				}
			}
			else {
				$response = $this->createChampion($champion_value,$value['id']);
				$inserts += 1;
			}
		}
		
		$datetime = new \DateTime('@'.strtotime('now'));
		$import->setFinishDate($datetime);
		$import->setStatus('OK');
		
		$this->entityManager->persist($import);
		$this->entityManager->flush();
		
		return 'RESULTADO: inserts='.$inserts.' y updates='.$updates;
	}

	public function importLanguages(): String {
		
		$response = null;
		
		// Consultamos los idiomas del Json
		$languagesJson = $this->getLanguages();
		
		// Consultamos los idiomas de la BBDD
		$update = $this->checkLanguages($languagesJson);
		
		if ($update) {
			foreach ($languagesJson as $language) {
				$languageBBDD = $this->entityManager->getRepository(Language::class)->findByCode($language);
				
				if (!$languageBBDD) {
					$languageNew = new Language();
					$languageNew->setCode($language);
					$this->entityManager->persist($languageNew);
				}
			}
			
			$this->entityManager->flush();
			$response = 'Se han actualizado los idiomas.';
		}
		else {
			$response = 'Los idiomas ya estaban actualizados.';
		}
		
		return $response;
	}

	#[Route('/import', name: 'import')]
    public function index(): Response {
		set_time_limit(7200);
		$this->entityManager = $this->getDoctrine()->getManager();
		
		$texto = $this->importLanguages();
		$texto = $this->importChampions();
		
		return $this->json([
			'message' => $texto,
			'path' => 'src/Controller/ChampionController.php',
		]);
    }
}
