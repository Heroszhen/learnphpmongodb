<?php

namespace App\Repository;

use App\Entity\Customer;
use Frameworkphp3wa\AbstractRepository;

class CustomerRepository extends AbstractRepository{
	
	public function __construct(){
		parent::__construct("mongodb");
	}

	
	public function add(Customer $cus){
		$collection = $this->db->customers;
		$collection->insertOne( [ 
			"civility" => $cus->getCivility() , 
			"lastname" => $cus->getLastname(),
			"firstname" => $cus->getFirstname(),
			"email" => $cus->getEmail(),
			"password" => $cus->getPassword(),
			"address" => $cus->getAddress(),
			"postcode" => $cus->getPostcode(),
			"city" => $cus->getCity(),
			"country" => $cus->getCountry(),
			"phone" => $cus->getPhone()
		]);
	}
	
	public function delete($query = null){
		$collection = $this->db->customers;
		if($query == null)$collection->drop();
		
	}
	
	public function get($query = null){
		$collection = $this->db->customers;
		if($query == null)$result = $collection->find([]);
		else $result = $collection->find([],$query);
		return $result;
	}
	
	public function get2($id,$options){
		$result = $this->db->customers->findOne(["_id" => new \MongoDB\BSON\ObjectId((string)$id)],$options);	
		return $result;
	}
}
