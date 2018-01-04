<?php

namespace CVBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class CVTwigExtension extends \Twig_Extension {

    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function getFilters() {
        return [
            new \Twig_Filter('puce', [$this, 'puce'])
        ];
    }

    public function puce($string, $puce) {
        $tab_string = str_split($string);
        for ($i = 0; $i < count($tab_string); $i++) {
            if (ord($tab_string[$i]) == 45) {
                if ($i == 0) {
                    $tab_string[$i] = $puce;
                } elseif (ord($tab_string[$i - 1]) == 10) {
                    $tab_string[$i] = $puce;
                }
            }
        }
        $string = implode("", $tab_string);
        return $string;
    }


    public function getFunctions(): array {
        return [
            new \Twig_SimpleFunction('date_diff', [$this, 'date_diff']),
        ];
    }

    private function handlePluriel($duree, $unite) {
        return ($duree > 1) ? $duree . " " . $unite . "s" : $duree . " " . $unite;
    }

    /**
     * Fonction à renvoyer une durée arrondie entre la date début et la date de fin
     */
    public function date_diff(\DateTime $begin, \DateTime $end): string {

        $interval = date_diff($begin, $end);

        $nb_days = $interval->d;
        $nb_months = $interval->m;
        $nb_years = $interval->y;

        $difference = "";

        if ($nb_years >= 1) {
            if ($nb_months >= 10)
                $nb_years++;

            $difference .= $this->handlePluriel($nb_years, "an");

            if ($nb_months > 2 && $nb_months < 10)
                $difference .= " et " . $nb_months . " mois";

        } else {
            if ($nb_months >= 10) {
                $nb_years++;
                $difference = $nb_years . " an";
            } else {
                if ($nb_days > 21) {
                    $nb_months++;
                    $difference = $nb_months . " mois";
                } else {
                    if ($nb_days > 4) {
                        $nb_weeks = ceil($nb_days / 7);
                        $difference = $this->handlePluriel($nb_weeks, "semaine");
                    } else {
                        $difference = $this->handlePluriel($nb_days, "jour");
                    }
                }
            }
        }

        return $difference;
    }


}