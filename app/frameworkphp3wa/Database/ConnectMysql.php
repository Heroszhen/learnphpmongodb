<?php
namespace Frameworkphp3wa\Database;

use \MongoDB\Client;

class ConnectMysql{
    private static $db = null;

    private function __construct() {}

    public static function getDB(){
        if (self::$db === null) {
            $config = include dirname(dirname(dirname(__DIR__))).'/app/config.php';
            //$client = new Client('mongodb+srv://'.$config['user'].':'.$config['mdp'].'@'.$config['host']);
            //$db = $client->sample_mflix->comments;
            $client = new Client('mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass%20Community&ssl=false');
            $db = $client->smallforum->user;
        }

        return $db;
    }
}
 
