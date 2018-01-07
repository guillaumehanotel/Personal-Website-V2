<?php

namespace BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PostRepository extends EntityRepository {

    public function findAll() {
        return $this->findBy([], ['date' => 'DESC']);
    }


    public function findLastPosts($limit){
        if (!is_numeric($limit) || $limit == 0) {
            $limit = 3;
        }

        $queryBuilder = $this->createQueryBuilder('p')
            ->orderBy('p.date', 'DESC');

        $query = $queryBuilder->getQuery();
        $query->setFirstResult(0)->setMaxResults($limit);

        return $query->getResult();

    }

    public function findAllPaginate(int $page, int $nbPerPage){
        // test des paramètres
        if (!is_numeric($nbPerPage) || $nbPerPage == 0) {
            $nbPerPage = 4;
        }
        $page = ($page == 0) ? 1 : $page;


        $queryBuilder = $this->createQueryBuilder('p')
            ->orderBy('p.date', 'DESC');

        $query = $queryBuilder->getQuery();

        $premierResultat = ($page - 1) * $nbPerPage;
        $query->setFirstResult($premierResultat)->setMaxResults($nbPerPage);

        $paginator = new Paginator($query);

        if ( ($paginator->count() <= $premierResultat) && $page != 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas.'); // page 404, sauf pour la première page
        }

        return $paginator;
        return $this->findBy([], ['date' => 'DESC']);
    }


}