<?php
namespace Frameworkphp3wa;

use Frameworkphp3wa\Kernel;

abstract class AbstractRepository{
    protected $db;

    public function __construct($db) {
        $this->db = (new Kernel)->getDB($db);
    }

}
