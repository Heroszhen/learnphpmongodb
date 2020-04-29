<?php

namespace App\Repository;

use App\Entity\Room;
use Frameworkphp3wa\AbstractRepository;

class RoomRepository extends AbstractRepository{
	
	public function __construct(){
		parent::__construct("mongodb");
	}
	
	public function add(Room $room){
		$collection = $this->db->rooms;
		$collection->insertOne( [ 
			"number" => $room->getNumber() , 
			"floor" => $room->getFloor(),
			"type" => $room->getType(),
			"beds" => $room->getBeds(),
			"hasairconditioner" => $room->getHasairconditioner(),
			"hastelevision" => $room->getHastelevision(),
			"costpernight" => $room->getCostpernight(),
			"bookings" => $room->getBooking()
		]);
	}
	
	public function delete($query = null){
		$collection = $this->db->rooms;
		if($query == null)$collection->drop();
		
	}
	
	public function getAll(){
		$collection = $this->db->rooms;
		$result = $collection->find([]);
		return $result;
	}
	
	public function get2($id,$options){
		$result = $this->db->rooms->findOne(["_id" => new \MongoDB\BSON\ObjectId((string)$id)],$options);	
		return $result;
	}
	
	public function push($id,$options){
		$this->db->rooms->updateOne(["_id"=>new \MongoDB\BSON\ObjectId((string)$id)],$options);
	}
}
