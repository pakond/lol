<?php

namespace App\Repository;

use App\Entity\Champion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\LanguageChampion;
use App\Entity\Language;

/**
 * @method Champion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Champion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Champion[]    findAll()
 * @method Champion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Champion::class);
    }

    // /**
    //  * @return Champion[] Returns an array of Champion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Champion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
	
	public function findByNameId($value): ?Champion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.nameid = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
	
	public function findByNameIdKeyId($value1,$value2): ?Champion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.nameid = :val1')
			->andWhere('c.keyid = :val2')
            ->setParameter('val1', $value1)
			->setParameter('val2', $value2)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
	
	public function findAll(): ?Array
    {
        return $this->createQueryBuilder('c')
            ->getQuery()
			->getResult()
        ;
    }

    public function findAllJSON($value1): ?Array
    {
        return $this->createQueryBuilder('c')
             ->select('c.id', 'c.name', 'img.full AS image')
             ->innerJoin('c.image', 'img')
             //->innerJoin('LanguageChampion', 'lc', 'WITH', 'lc.champion_id = c.id')
             //->innerJoin('Language', 'l', 'WITH', 'lc.language_id = l.id')
             //->innerJoin('c.image', 'img')
             //->innerJoin('c.language_champion', 'lang')
             //->andWhere('lang.code = :val1')
             //->setParameter('val1', $value1)
             ->getQuery()
             ->getResult();

    }

    // public function findAllJSON($value1): ?Array
    // {
    //     $conn = $this->getEntityManager()
    //     ->getConnection();

    //     $query = "SELECT c.id, c.name FROM champion c INNER JOIN language_champion lc ON lc.champion_id = c.id INNER JOIN language l ON l.id = lc.language_id";
    //     $stmt = $conn->prepare($query);
    //     $stmt->execute(array('category' => $category->getId()));
    //     return $stmt->fetchAll();
    // }
}
