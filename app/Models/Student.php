<?php


namespace App\Models;


class Student
{
    private  $id;
    private  $regNo;
    private  $info;
    private  $bankName;
    private  $accountNumber;
    private  $accountName;
    private  $bankSortCode;
    private  $schoolName;
    private  $schoolState;
    private  $schoolAddress;
    private  $department;
    private  $coordinatorName;
    private  $coordinatorEmail;
    private  $coordinatorPhone;
    private  $coordinatorRemark;
    private  $startDate;
    private  $paid;
    private  $logBookSigned;
    private  $managerName;
    private  $managerPhone;
    private  $managerEmail;
    private  $companyName;
    private  $companyAddress;
    private  $companyType;
    private  $companyState;
    private  $weeks = array();

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
    public function getRegNo(): string
    {
        return $this->regNo;
    }

    /**
     * @param string $regNo
     */
    public function setRegNo(string $regNo): void
    {
        $this->regNo = $regNo;
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
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     */
    public function setBankName(string $bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber(string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     */
    public function setAccountName(string $accountName): void
    {
        $this->accountName = $accountName;
    }

    /**
     * @return string
     */
    public function getBankSortCode(): string
    {
        return $this->bankSortCode;
    }

    /**
     * @param string $bankSortCode
     */
    public function setBankSortCode(string $bankSortCode): void
    {
        $this->bankSortCode = $bankSortCode;
    }

    /**
     * @return string
     */
    public function getSchoolName(): string
    {
        return $this->schoolName;
    }

    /**
     * @param string $schoolName
     */
    public function setSchoolName(string $schoolName): void
    {
        $this->schoolName = $schoolName;
    }

    /**
     * @return string
     */
    public function getSchoolState(): string
    {
        return $this->schoolState;
    }

    /**
     * @param string $schoolState
     */
    public function setSchoolState(string $schoolState): void
    {
        $this->schoolState = $schoolState;
    }

    /**
     * @return string
     */
    public function getSchoolAddress(): string
    {
        return $this->schoolAddress;
    }

    /**
     * @param string $schoolAddress
     */
    public function setSchoolAddress(string $schoolAddress): void
    {
        $this->schoolAddress = $schoolAddress;
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

    /**
     * @return string
     */
    public function getCoordinatorName(): string
    {
        return $this->coordinatorName;
    }

    /**
     * @param string $coordinatorName
     */
    public function setCoordinatorName(string $coordinatorName): void
    {
        $this->coordinatorName = $coordinatorName;
    }

    /**
     * @return string
     */
    public function getCoordinatorEmail(): string
    {
        return $this->coordinatorEmail;
    }

    /**
     * @param string $coordinatorEmail
     */
    public function setCoordinatorEmail(string $coordinatorEmail): void
    {
        $this->coordinatorEmail = $coordinatorEmail;
    }

    /**
     * @return string
     */
    public function getCoordinatorPhone(): string
    {
        return $this->coordinatorPhone;
    }

    /**
     * @param string $coordinatorPhone
     */
    public function setCoordinatorPhone(string $coordinatorPhone): void
    {
        $this->coordinatorPhone = $coordinatorPhone;
    }

    /**
     * @return string
     */
    public function getCoordinatorRemark(): string
    {
        return $this->coordinatorRemark;
    }

    /**
     * @param string $coordinatorRemark
     */
    public function setCoordinatorRemark(string $coordinatorRemark): void
    {
        $this->coordinatorRemark = $coordinatorRemark;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     */
    public function setPaid(bool $paid): void
    {
        $this->paid = $paid;
    }

    /**
     * @return bool
     */
    public function isLogBookSigned(): bool
    {
        return $this->logBookSigned;
    }

    /**
     * @param bool $logBookSigned
     */
    public function setLogBookSigned(bool $logBookSigned): void
    {
        $this->logBookSigned = $logBookSigned;
    }

    /**
     * @return string
     */
    public function getManagerName(): string
    {
        return $this->managerName;
    }

    /**
     * @param string $managerName
     */
    public function setManagerName(string $managerName): void
    {
        $this->managerName = $managerName;
    }

    /**
     * @return string
     */
    public function getManagerPhone(): string
    {
        return $this->managerPhone;
    }

    /**
     * @param string $managerPhone
     */
    public function setManagerPhone(string $managerPhone): void
    {
        $this->managerPhone = $managerPhone;
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
     * @return array
     */
    public function getWeeks(): array
    {
        return $this->weeks;
    }

    /**
     * @return string
     */
    public function getManagerEmail(): string
    {
        return $this->managerEmail;
    }

    /**
     * @param string $managerEmail
     */
    public function setManagerEmail(string $managerEmail): void
    {
        $this->managerEmail = $managerEmail;
    }

    /**
     * @param WeeklyTasks $week
     */
    public function setWeeks(WeeklyTasks $week): void
    {
        array_push($this->weeks,$week);
    }

    public function update($arr){
        $this->setRegNo($arr["reg_number"]);
        $this->setId($arr["student_id"]);
        $this->setPaid($arr["paid"]);
        $this->setStartDate($arr["start_date"]);

        $bank = $arr["bank"];
        $this->setAccountName($bank["account_name"]);
        $this->setBankName($bank["bank_name"]);
        $this->setBankSortCode($bank["sort_code"]);
        $this->setAccountNumber($bank["account_number"]);

        $info = $arr["personal_info"];
        $personInfo = new PersonalDetails($info);
        $this->setInfo($personInfo);


        $school = $arr["school"];
        $this->setSchoolName($school["school_name"]);
        $this->setSchoolState($school["school_state"]);
        $this->setSchoolAddress($school["school_address"]);
        $this->setDepartment($school["department"]);
        $this->setCoordinatorName($school["coordinator_name"]);
        $this->setCoordinatorEmail($school["coordinator_email"]);
        $this->setCoordinatorPhone($school["coordinator_phone"]);
        $this->setCoordinatorRemark($school["coordinator_remark"]);


        $company = $arr["company"];
        $this->setManagerName($company["manager_name"]);
        $this->setManagerPhone($company["manager_phone"]);
        $this->setManagerEmail($company["manager_email"]);
        $this->setCompanyName($company["company_name"]);
        $this->setCompanyAddress($company["company_address"]);
        $this->setCompanyState($company["company_state"]);
        $this->setCompanyType($company["company_type"]);

        $logbook = $arr["log_book"];
        $this->setLogBookSigned($logbook["signed"]);
        $weeks = $logbook["weeks"];

        foreach ($weeks as $week){
            $weekObj = new WeeklyTasks($week);
            $this->setWeeks($weekObj);
        }


    }




}
