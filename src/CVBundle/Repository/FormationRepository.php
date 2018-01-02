<?php

namespace CVBundle\Repository;

use Doctrine\ORM\EntityRepository;


class FormationRepository extends EntityRepository{

    public function findAll() {
        return $this->findBy([], ['anneeFin' => 'DESC']);
    }

}