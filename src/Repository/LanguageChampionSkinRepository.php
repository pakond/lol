<?php

namespace App\Repository;

use App\Entity\LanguageChampionSkin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LanguageChampionSkin|null find($id, $lockMode = null, $lockVersion = null)
 * @method LanguageChampionSkin|null findOneBy(array $criteria, array $orderBy = null)
 * @method LanguageChampionSkin[]    findAll()
 * @method LanguageChampionSkin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageChampionSkinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LanguageChampionSkin::class);
    }

    // /**
    //  * @return LanguageChampionSkin[] Returns an array of LanguageChampionSkin objects
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
    public function findOneBySomeField($value): ?LanguageChampionSkin
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
