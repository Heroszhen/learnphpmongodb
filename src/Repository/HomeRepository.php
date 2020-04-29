<?php

namespace App\Repository;

use App\Entity\Exemple;
use Frameworkphp3wa\AbstractRepository;

class HomeRepository extends AbstractRepository{
	
	public function Learning(){
		$comments = $this->db->small->user;
		$result = $comments->find([]);
		return $result;
	}
}
