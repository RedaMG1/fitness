<?php

namespace App\Repository;

use App\Entity\DayStart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DayStart>
 *
 * @method DayStart|null find($id, $lockMode = null, $lockVersion = null)
 * @method DayStart|null findOneBy(array $criteria, array $orderBy = null)
 * @method DayStart[]    findAll()
 * @method DayStart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DayStartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DayStart::class);
    }

//    /**
//     * @return DayStart[] Returns an array of DayStart objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DayStart
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
