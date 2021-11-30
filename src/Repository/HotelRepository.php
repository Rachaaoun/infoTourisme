<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
/**
 * @method Hotel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hotel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hotel[]    findAll()
 * @method Hotel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

    // /**
    //  * @return Hotel[] Returns an array of Hotel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hotel
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */




        /**
     *@return Hotel[]
     */
    public function findSearch(SearchData $search) : array
    {
        $query = $this->createQueryBuilder('d')
        ->select('d');


        if($search->q){
            $query =
                $query
                    ->where('d.nom LIKE :q')
                    ->setParameter('q','%' .$search->q .'%');
        }

      


        return $query->getQuery()->getResult();
    }




    public function findAllSorted()
{
    $rawSql = "SELECT * FROM hotel AS h ORDER BY h.categorie desc";

    $stmt = $this->getEntityManager()->getConnection()->prepare($rawSql);
    $stmt->execute([]);

    return $stmt->getResult();
}

}
