<?php

namespace App\Repository;

use App\Entity\StatusAutor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatusAutor>
 *
 * @method StatusAutor|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusAutor|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusAutor[]    findAll()
 * @method StatusAutor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusAutorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusAutor::class);
    }

//    /**
//     * @return StatusAutor[] Returns an array of StatusAutor objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StatusAutor
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
