<?php

namespace App\Repository;

use App\Entity\Booking;
use Frameworkphp3wa\AbstractRepository;

class BookingRepository extends AbstractRepository{
	
	public function __construct(){
		parent::__construct("redis");
	}
	
	public function add(Booking $booking){
		//var_dump($this->db);
		$key = $booking->getId();
        $this->db->hset($key, 'customer_id', $booking->getCustomerId());
        $this->db->hset($key, 'checkinDate', $booking->getCheckinDate());
        $this->db->hset($key, 'checkoutDate', $booking->getCheckoutDate());
        $this->db->hset($key, 'adults', $booking->getAdults());
        $this->db->hset($key, 'children', $booking->getChildren());

	}
	
	public function get($query=null){
		//https://scotch.io/tutorials/getting-started-with-redis-in-php
		$result = [];
		if($query == null){
			$allkeys = $this->db->keys('*');
			foreach($allkeys as $k=>$v){
				$courant = [];
				$courant = $this->db->hgetall($v);
				$courant["checkinDate"] = new \DateTime($courant["checkinDate"]);
				$courant["checkoutDate"] = new \DateTime($courant["checkoutDate"]);
				$courant["redisid"] = $v;
				array_push($result,$courant);
			}
		}
		return $result;
	}
	
	public function getByKey($key){
		return $this->db->hgetall($key);
	}
	
	public function del($key){
		$this->db->del($key, 'customer_id');
        $this->db->del($key, 'checkinDate');
        $this->db->del($key, 'checkoutDate');
        $this->db->del($key, 'adults');
        $this->db->del($key, 'children');
	}
	/*
	public function delete($query = null){
		$collection = $this->db->rooms;
		if($query == null)$collection->drop();
		
	}*/
}
