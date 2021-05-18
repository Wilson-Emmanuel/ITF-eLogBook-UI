<?php


namespace App\Models;


class Manager
{
    private  $id;
    private  $companyName;
    private  $companyAddress;
    private  $companyType;
    private  $companyState;
    private  $info;

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
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCompanyAddress(): string
    {
        return $this->companyAddress;
    }

    /**
     * @param string $companyAddress
     */
    public function setCompanyAddress(string $companyAddress): void
    {
        $this->companyAddress = $companyAddress;
    }

    /**
     * @return string
     */
    public function getCompanyType(): string
    {
        return $this->companyType;
    }

    /**
     * @param string $companyType
     */
    public function setCompanyType(string $companyType): void
    {
        $this->companyType = $companyType;
    }

    /**
     * @return string
     */
    public function getCompanyState(): string
    {
        return $this->companyState;
    }

    /**
     * @param string $companyState
     */
    public function setCompanyState(string $companyState): void
    {
        $this->companyState = $companyState;
    }

    /**
     * @return PersonalDetails
     */
    public function getInfo(): PersonalDetails
    {
        return $this->info;
    }

    /**
     * @param PersonalDetails $info
     */
    public function setInfo(PersonalDetails $info): void
    {
        $this->info = $info;
    }

    private function update($arr)
    {

        $info = $arr["personal_details"];
        $personInfo = new PersonalDetails($info);
        $this->setInfo($personInfo);
        $this->setId($arr["manager_id"]);

        $this->setCompanyType($arr["company_type"]);
        $this->setCompanyName($arr["company_name"]);
        $this->setCompanyAddress($arr["company_address"]);
        $this->setCompanyState($arr["company_state"]);
    }



}
