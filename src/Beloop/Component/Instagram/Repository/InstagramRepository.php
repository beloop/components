<?php

/*
 * This file is part of the Beloop package.
 *
 * Copyright (c) 2016 AHDO Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace Beloop\Component\Instagram\Repository;

use Doctrine\ORM\EntityRepository;

use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class InstagramRepository.
 */
class InstagramRepository extends EntityRepository
{
    /**
     * Find images from users on the same course
     *
     * @param UserInterface $user
     *
     * @return array
     */
    public function findByUser(UserInterface $user)
    {
        $qb = $this->createQueryBuilder('i');

        $qb
            ->addSelect('u', 'c')
                ->innerJoin('i.user', 'u')
                ->innerJoin('u.courses', 'c')
            ->where('c.id IN(:userCourses)')->setParameter('userCourses', $user->getCourses())
//            ->where('u.courses = :userCourses')->setParameter('userCourses', $user->getCourses())
            ->orderBy('i.createdAt', 'DESC');
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * Find one image.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
//        $qb = $this->createQueryBuilder('c');
//
//        $qb
//            ->addSelect('l, m')
//                ->leftJoin('c.lessons', 'l')
//                ->leftJoin('l.modules', 'm')
//            ->orderBy('l.position', 'ASC')
//                ->addOrderBy('m.position', 'ASC')
//        ;
//
//        foreach ($criteria as $key => $value) {
//            $qb
//                ->andWhere(vsprintf('c.%s = :%s', [$key, $key]))
//                ->setParameter($key, $value);
//        }
//
//        return $qb->getQuery()->getOneOrNullResult();
    }
}
