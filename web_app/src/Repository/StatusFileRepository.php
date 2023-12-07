<?php

namespace App\Repository;

use App\Entity\StatusFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatusFile>
 *
 * @method StatusFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusFile[]    findAll()
 * @method StatusFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusFile::class);
    }

//    /**
//     * @return StatusFile[] Returns an array of StatusFile objects
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

//    public function findOneBySomeField($value): ?StatusFile
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
