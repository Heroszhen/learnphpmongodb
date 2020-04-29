<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use App\Entity\Booking;
use App\Repository\BookingRepository;
use App\Repository\RoomRepository;

class AdminreservationController extends AbstractController{
	
	public function index(){
		$br = new BookingRepository();
		$bookings = $br->get();
		$cr = new CustomerRepository();
		$options = [ 
				'projection' => [ "lastname" => 1],
		];
		foreach($bookings as $k=>$v){
			$customerid = $v["customer_id"];
			
			$result = $cr->get2($customerid ,$options);
			$bookings[$k]["customer_name"] = $result->lastname;
		}
		//var_dump($bookings);
		return $this->render("admin.reservation.index.twig",[
			"bookings" => $bookings
        ]);
	}
	
	/**
	 * redisid
	 */
	public function deleteOneBooking($id){
		$tab = explode("/",$id);
		$id = $tab[4];
		$br = new BookingRepository();
		$br->del($id);
		header("Location: /admin/reservation");
	}
	
	/**
	 * redisid
	 */
	public function editOneBooking($id,$post=null){
		$tab = explode("/",$id);
		$key = $tab[4];
		$br = new BookingRepository();
		$booking = $br->getByKey($key);
		$total = $booking["adults"] + $booking["children"];
		$cr = new CustomerRepository();
		$customer = $cr->get2($booking["customer_id"],[]);
		
		$rr = new RoomRepository();
		$allrooms = $rr->getAll();
		
		$cr = new CustomerRepository();
		$options = [ 
			'projection' => [ "lastname" => 1 , "_id" => 1],
			'sort' => [ 'lastname' => 1]

		];
		$allcustomers = $cr->get($options);
		
		if($post == null){
			$post['client'] = $booking["customer_id"];
			$post['start'] = $booking["checkinDate"];
			$post['end'] = $booking["checkoutDate"];
			$post['quantity1'] = $booking["adults"];
			$post['quantity2'] = $booking["children"];
			$post['room'] = "";
		}else{
			$courant = [];
			$newbooking = [
				'checkinDate'=>$post['start'],
				'checkoutDate'=>$post['end'],
				'adults'=>$post['quantity1'],
				'children'=>$post['quantity2']
			];
			$courant["booking"] = $newbooking;
			$courant["customer"] = $customer;var_dump($courant);
			
			$options = ['$push' => ["bookings"=>$courant]];
			$rr->push($post['room'],$options);
/*
			echo "<pre>";
			var_dump($rr->get2($post['room'],[]));
			echo "</pre>";*/
			$br->del($key);
			header("Location: /admin/reservation");
		}
		
		//var_dump($total);
		return $this->render("admin.reservation.edit.twig",[
			"id" => $key,
			"booking" => $booking,
			"post" => $post,
			"allcustomers" => $allcustomers,
			"allrooms" => $allrooms
        ]);
	}
}
