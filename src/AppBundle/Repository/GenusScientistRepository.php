<?php
/**
 * Created by PhpStorm.
 * User: timbauer
 * Date: 12/22/16
 * Time: 12:10 AM
 */

namespace AppBundle\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;

class GenusScientistRepository extends EntityRepository
{
    public function findAllExperts(){
        return $this->createQueryBuilder('genus')
            ->addCriteria(self::createExpertCriteria())
            ->getQuery()
            ->execute();
    }
    static public function createExpertCriteria(){
        return Criteria::create()
            ->andWhere(Criteria::expr()->gt('yearsStudied', 20))
            ->orderBy(['yearsStudied', 'DESC']);
    }
}