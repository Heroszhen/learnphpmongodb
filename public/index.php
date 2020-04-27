<?php

require_once "../vendor/autoload.php";

use Frameworkphp3wa\Kernel;

//if($_SESSION == null)session_start();
$kernel = new Kernel();
$kernel->run();
