<?php
namespace Frameworkphp3wa;

use Frameworkphp3wa\Kernel;

abstract class AbstractRepository{
    protected $pdo;

    public function __construct() {
        $this->pdo = (new Kernel)->getPDO();
    }

}