<?php

namespace App\Repository;

use App\Entity\Casopis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Casopis>
 *
 * @method Casopis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Casopis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Casopis[]    findAll()
 * @method Casopis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasopisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Casopis::class);
    }

//    /**
//     * @return Casopis[] Returns an array of Casopis objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Casopis
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
