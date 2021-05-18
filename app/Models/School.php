<?php


namespace App\Models;


class School
{
 private  $id;
 private  $name;
 private  $address;
 private  $stateName;

    public function __construct($arr)
    {
        if(count($arr) > 0){
            $this->update($arr);
        }
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getStateName(): string
    {
        return $this->stateName;
    }

    /**
     * @param string $stateName
     */
    public function setStateName(string $stateName): void
    {
        $this->stateName = $stateName;
    }

    private function update($arr)
    {
        $this->setId($arr["school_id"]);
        $this->setName($arr["name"]);
        $this->setAddress($arr["address"]);
        $this->setStateName($arr["state"]);
    }


}
