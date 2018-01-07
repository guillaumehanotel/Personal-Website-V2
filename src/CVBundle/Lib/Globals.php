<?php

namespace CVBundle\Lib;


class Globals {

    protected static $uploadCompetenceDir;
    protected static $uploadRealisationDir;

    public static function setUploadCompetenceDir($dir) {
        self::$uploadCompetenceDir = $dir;
    }

    public static function getUploadCompetenceDir() {
        return self::$uploadCompetenceDir;
    }


    public static function setUploadRealisationDir($dir){
        self::$uploadRealisationDir = $dir;
    }

    public static function getUploadRealisationDir() {
        return self::$uploadRealisationDir;
    }


}