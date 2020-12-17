<?php

namespace App\Repository;

use App\Entity\Ville;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ville|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ville|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ville[]    findAll()
 * @method Ville[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ville::class);
    }

    public function findByTempMax($temp){
        return $this->createQueryBuilder('v')
            ->select('v.id','v.nom','v.codeCommune','v.gentile','v.recordTempChaleur','v.recordTempFroid','v.temperatureMoyenne')
            ->andWhere('v.recordTempChaleur >= :val')
            ->setParameter('val',$temp)
            ->orderBy('v.recordTempChaleur', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByTempMin($temp){
        return $this->createQueryBuilder('v')
            ->select('v.id','v.nom','v.codeCommune','v.gentile','v.recordTempChaleur','v.recordTempFroid','v.temperatureMoyenne')
            ->andWhere('v.recordTempFroid <= :val')
            ->setParameter('val',$temp)
            ->orderBy('v.recordTempFroid', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByTempMoy($temp){
        return $this->createQueryBuilder('v')
            ->select('v.id','v.nom','v.codeCommune','v.gentile','v.recordTempChaleur','v.recordTempFroid','v.temperatureMoyenne')
            ->andWhere('v.temperatureMoyenne >= :val')
            ->setParameter('val',$temp)
            ->orderBy('v.temperatureMoyenne', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Ville[] Returns an array of Ville objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ville
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
