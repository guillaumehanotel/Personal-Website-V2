<?php

namespace CVBundle\Repository;

use Doctrine\ORM\EntityRepository;


class ExperienceRepository extends EntityRepository {

    public function findAll() {
        return $this->findBy([], ['ordre' => 'ASC']);
    }

}