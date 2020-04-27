<?php

namespace App\Repository;

use App\Entity\Exemple;
use Frameworkphp3wa\AbstractRepository;

class HomeRepository extends AbstractRepository{
	
	public function Learning(){
		$comments = $this->db;
		$result = $comments->find([]);
		return $result;
	}
}
