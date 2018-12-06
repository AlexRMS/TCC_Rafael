<?php

namespace App\Repository;

use App\Entity\PedidoProduto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PedidoProduto|null find($id, $lockMode = null, $lockVersion = null)
 * @method PedidoProduto|null findOneBy(array $criteria, array $orderBy = null)
 * @method PedidoProduto[]    findAll()
 * @method PedidoProduto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoProdutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PedidoProduto::class);
    }

    // /**
    //  * @return PedidoProduto[] Returns an array of PedidoProduto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PedidoProduto
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
