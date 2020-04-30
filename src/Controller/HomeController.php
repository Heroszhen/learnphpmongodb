<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;
use App\Repository\HomeRepository;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use App\Entity\Booking;
use App\Repository\BookingRepository;

class HomeController extends AbstractController{

    public function index(){
        $flash = new FlashBag();
        $flash->empty();
        $flash->set("exemple flashbag message","info");
        return $this->render("home.index.twig",[
            "flash" => $flash->get()
        ]);
    }
    
    public function Learning(){/*
		$hr = new HomeRepository();
		$comments = $hr->Learning();
		echo "<pre>";
		var_dump($comments);
		echo "</pre>";*/
		$comments = [];
		$cr = new CustomerRepository();
		$cr->delete();
		return $this->render("home.learning.twig",[
            "comments" => $comments
        ]);
	}
	
	public function reservation($post=null){
		$flash = new FlashBag();
		$flash->empty();
		if($post == null){
			if(isset($_SESSION["user"]))$post['client'] = $_SESSION["user"]["_id"];
			else $post['client'] = "";
			$post['start'] = "";
			$post['end'] = "";
			$post['quantity1'] = 1;
			$post['quantity2'] = 1;
		}else{
			if($post['client'] == "" || $post['start'] == "" || $post['end'] == "")$flash->set("Veuillez remplir tous les champs","danger");
			else{
				$booking = new Booking();
				$booking->setId(uniqid());
				$booking->setCustomerid($post['client']);
				$booking->setCheckindate($post['start']);
				$booking->setCheckoutdate($post['end']);
				$booking->setAdults($post['quantity1']);
				$booking->setChildren($post['quantity2']);
				$br = new BookingRepository();
				$br->add($booking);
				$flash->set("Enregistré","success");
			}
			//var_dump($post);
		}
		
		$cr = new CustomerRepository();
		$options = [ 
			'projection' => [ "lastname" => 1 , "_id" => 1],
			'sort' => [ 'lastname' => 1]

		];
		$allcustomers = $cr->get($options);
		$flash = $flash->get();
		
		return $this->render("home.reservation.twig",[
            "allcustomers" => $allcustomers,
            "post" => $post,
            "flash" => $flash
        ]);
	}
	
	/**
     * 
     */
    public function login($post=null){
		if($post == null)$post["email"] = "";
		else{
			$cr = new CustomerRepository();
			$customer = $cr->findByEmail($post["email"]);
			if($customer != null){
				$_SESSION["user"] = $customer;
				header("Location: /");
			}
		}
		return $this->render("home.login.twig",[
            "post" => $post
        ]);
	}
	
	public function logout(){
        unset($_SESSION["user"]);
        //session_destroy();
        header("Location: /");
    }
	
}
