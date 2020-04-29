<?php
require_once "../vendor/autoload.php";

use App\Entity\Customer;
use App\Repository\CustomerRepository;

class CustomerFixtures{
	public function load(){
		$cr = new CustomerRepository();
		for($i = 0;$i<10;$i++){
			$faker = Faker\Factory::create();
			$cus = new Customer();
			$cus->setCivility("monsieur"); 
			$cus->setLastname($faker->name);
			$cus->setFirstname($faker->name);
			$cus->setEmail($faker->email);
			$cus->setPassword($faker->password);
			$cus->setAddress($faker->streetAddress);
			$cus->setPostcode($faker->postcode);
			$cus->setCity($faker->city);
			$cus->setCountry($faker->country);
			$cus->setPhone($faker->phoneNumber);
			$cr->add($cus);
		}
	}
}

$cf = new CustomerFixtures();
$cf->load();
