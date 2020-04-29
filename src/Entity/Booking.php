<?php

namespace App\Entity;

class Booking{
    private $id;
    private $customerid;
    private $checkindate;
    private $checkoutdate;
    private $adults;
    private $children;
    

    public function getId():string
    {
        return $this->id;
    }
    
    public function setId(string $id):self
    {
        $this->id = $id;
        return $this;
    }
    
    public function getCustomerid():string
    {
        return $this->customerid;
    }
    public function setCustomerid(string $customerid): self
    {
        $this->customerid = $customerid;
        return $this;
    }
    
    public function getCheckindate():string
    {
        return $this->checkindate;
    }
    public function setCheckindate(string $checkindate): self
    {
        $this->checkindate = $checkindate;
        return $this;
    }
    
    public function getCheckoutdate():string
    {
        return $this->checkoutdate;
    }
    public function setCheckoutdate(string $checkoutdate): self
    {
        $this->checkoutdate = $checkoutdate;
        return $this;
    }
    
    public function getAdults(): int
    {
        return $this->adults;
    }
    public function setAdults(int $adults): self
    {
        $this->adults = $adults;
        return $this;
    }
    
    public function getChildren(): int
    {
        return $this->children;
    }
    public function setChildren(int $children): self
    {
        $this->children = $children;
        return $this;
    }
}
