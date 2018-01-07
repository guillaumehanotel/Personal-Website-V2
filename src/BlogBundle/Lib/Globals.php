<?php
/**
 * Created by PhpStorm.
 * User: guillaumeh
 * Date: 07/01/18
 * Time: 12:55
 */

namespace BlogBundle\Lib;


class Globals {

    protected static $uploadAvatarDir;

    public static function setUploadAvatarDir($dir) {
        self::$uploadAvatarDir = $dir;
    }

    public static function getUploadAvatarDir() {
        return self::$uploadAvatarDir;
    }


}