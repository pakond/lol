<?php

namespace App\Repository;

use App\Entity\Champion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
}
