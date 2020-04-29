<?php
require_once "../vendor/autoload.php";

use App\Entity\Room;
use App\Repository\RoomRepository;

class RoomFixtures{
	public function load(){
		$cr = new RoomRepository();
		for($i = 0;$i<10;$i++){
			$faker = Faker\Factory::create();
			$room = new Room();
			$room->setNumber($faker->numberBetween($min=100,$max=500)); 
			$room->setFloor(intval($room->getNumber()/100));
			$typs = ["simple","double","suite"];
			$typen = $faker->numberBetween($min = 0, $max = 2);
			$room->setType($typs[$typen]);
			$room->setBeds($faker->numberBetween($min = 1, $max = 4));
			$room->setHasairconditioner($faker->boolean($chanceOfGettingTrue = 50));
			$room->setHastelevision($faker->boolean($chanceOfGettingTrue = 50));
			$room->setCostpernight($faker->numberBetween($min = 30, $max = 440));
			$room->setBooking([]);
			$cr->add($room);
		}
	}
}

$cf = new RoomFixtures();
$cf->load();
