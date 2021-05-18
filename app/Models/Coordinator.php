<?php


namespace App\Models;


class Coordinator
{
    private  $id;
    private  $school;
    private  $info;
    private  $department;

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
     * @return School
     */
    public function getSchool(): School
    {
        return $this->school;
    }

    /**
     * @param School $school
     */
    public function setSchool(School $school): void
    {
        $this->school = $school;
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

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }
    private function update($arr)
    {
        $info = $arr["personal_details"];
        $personInfo = new PersonalDetails($info);
        $this->setInfo($personInfo);
        $this->setId($arr["coordinator_id"]);
        $this->setDepartment($arr["department"]);

        $school = $arr["school"];
        $schoolObj = new School($school);
        $this->setSchool($schoolObj);

    }


}
