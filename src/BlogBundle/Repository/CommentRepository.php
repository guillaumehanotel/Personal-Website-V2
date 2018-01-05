<?php

namespace BlogBundle\Repository;


use BlogBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository {

    public function findValidCommentsByPost(Post $post){

        $queryBuilder = $this->createQueryBuilder('c')
            ->where('c.is_valid = 1')
            ->andWhere('c.Post = :post_id')
            ->setParameter('post_id', $post->getId())
            ->orderBy('c.date', 'DESC')
            ->getQuery();

        return $queryBuilder->getResult();

    }


}