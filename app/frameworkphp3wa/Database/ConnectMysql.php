<?php
namespace Frameworkphp3wa\Database;

use \MongoDB\Client;

class ConnectMysql{
    private static $db = null;

    private function __construct() {}

    public static function getDB($db){
        if (self::$db === null) {
            $config = include dirname(dirname(dirname(__DIR__))).'/app/config.php';
            //$client = new Client('mongodb+srv://'.$config['user'].':'.$config['mdp'].'@'.$config['host']);
            //$db = $client->sample_mflix->comments;
            if($db == "mongodb"){
				$client = new Client('mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass%20Community&ssl=false');
				$db = $client->phpmongodb;
			}
			if($db == "redis"){
				$client = new \Predis\Client();
				$db = $client;
			}
        }

        return $db;
    }
}
 
