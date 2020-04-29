<?php

namespace App\Entity;

class Room{
    private $id;
    private $number;
    private $floor;
    private $type;//simple, double ,suite
    private $beds;
    private $hasairconditioner;
    private $hastelevision;
    private $costpernight;
    private $booking = [];
    

    public function getId()
    {
        return $this->id();
    }
    
    public function getNumber(): int
    {
        return $this->number;
    }
    public function setNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }
    
    public function getFloor(): int
    {
        return $this->floor;
    }
    public function setFloor(int $floor): self
    {
        $this->floor = $floor;
        return $this;
    }
    
    public function getType(): string
    {
        return $this->type;
    }
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    
    public function getBeds(): int
    {
        return $this->beds;
    }
    public function setBeds(int $beds): self
    {
        $this->beds = $beds;
        return $this;
    }
    
    public function getHasairconditioner(): bool
    {
        return $this->hasairconditioner;
    }
    public function setHasairconditioner(bool $hasairconditioner): self
    {
        $this->hasairconditioner = $hasairconditioner;
        return $this;
    }
    
    public function getHastelevision(): bool
    {
        return $this->hastelevision;
    }
    public function setHastelevision(bool $hastelevision): self
    {
        $this->hastelevision = $hastelevision;
        return $this;
    }
    
    public function getCostpernight(): int
    {
        return $this->costpernight;
    }
    public function setCostpernight(int $costpernight): self
    {
        $this->costpernight = $costpernight;
        return $this;
    }
    
    public function getBooking(): array
    {
        return $this->booking;
    }
    public function setBooking(array $booking): self
    {
        $this->booking = $booking;
        return $this;
    }
}
