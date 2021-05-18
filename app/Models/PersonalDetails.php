<?php


namespace App\Models;


class PersonalDetails
{
    private  $firstName;
    private  $lastName;
    private  $email;
    private  $phone;
    private  $userType;

    public function __construct($arr)
    {
        if(count($arr) > 0){
            $this->update($arr);
        }
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getFullName():string{
        return $this->getLastName()." ".$this->getFirstName();
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getUserType(): string
    {
        return $this->userType;
    }

    /**
     * @param string $userType
     */
    public function setUserType(string $userType): void
    {
        $this->userType = $userType;
    }

    public function update($arr):void
    {
        $this->setUserType($arr["user_type"]);
        $this->setEmail($arr["email"]);
        $this->setPhone($arr["phone"]);
        $this->setLastName($arr["last_name"]);
        $this->setFirstName($arr["first_name"]);
    }

}
