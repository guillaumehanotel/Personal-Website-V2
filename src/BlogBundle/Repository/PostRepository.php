<?php

namespace BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository {

    public function findAll() {
        return $this->findBy([], ['date' => 'DESC']);
    }

}