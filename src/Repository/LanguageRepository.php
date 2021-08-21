<?php

namespace App\Repository;

use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Language|null find($id, $lockMode = null, $lockVersion = null)
 * @method Language|null findOneBy(array $criteria, array $orderBy = null)
 * @method Language[]    findAll()
 * @method Language[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Language::class);
    }

	public function findAll(): ?Array
    {
        return $this->createQueryBuilder('l')
            ->getQuery()
			->getResult()
        ;
    }
	
	public function findAllFav(): ?Array
    {		
        return $this->createQueryBuilder('l')
			->andWhere("l.code = 'en_US' or l.code = 'es_ES' or l.code = 'de_DE' or l.code = 'fr_FR' or l.code = 'ru_RU' or l.code = 'ja_JP'")
            ->getQuery()
			->getResult()
        ;
    }
	
	public function findAllLimit(): ?Array
    {
        return $this->createQueryBuilder('l')
			->setMaxResults(2)
            ->getQuery()
			->getResult()
        ;
    }

	public function findByCode($value): ?Language
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.code = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return Language[] Returns an array of Language objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Language
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
