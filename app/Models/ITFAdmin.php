<?php


namespace App\Models;


class ITFAdmin
{
    private  $id;
    private  $staffNo;
    private  $branch;
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
    public function getStaffNo(): string
    {
        return $this->staffNo;
    }

    /**
     * @param string $staffNo
     */
    public function setStaffNo(string $staffNo): void
    {
        $this->staffNo = $staffNo;
    }

    /**
     * @return string
     */
    public function getBranch(): string
    {
        return $this->branch;
    }

    /**
     * @param string $branch
     */
    public function setBranch(string $branch): void
    {
        $this->branch = $branch;
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
        $this->setStaffNo($arr["staff_number"]);
        $this->setId($arr["itf_admin_id"]);
        $this->setBranch($arr["branch"]);


    }


}
