<?php

namespace App\Repository;

use App\Entity\AssessmentQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AssessmentQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssessmentQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssessmentQuestion[]    findAll()
 * @method AssessmentQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssessmentQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssessmentQuestion::class);
    }

    // /**
    //  * @return AssessmentQuestion[] Returns an array of AssessmentQuestion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssessmentQuestion
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
