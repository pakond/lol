<?php

namespace App\Repository;

use App\Entity\LanguageChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LanguageChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method LanguageChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method LanguageChampion[]    findAll()
 * @method LanguageChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LanguageChampion::class);
    }

    // /**
    //  * @return LanguageChampion[] Returns an array of LanguageChampion objects
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
    public function findOneBySomeField($value): ?LanguageChampion
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
