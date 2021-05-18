<?php


namespace App\Models;


class WeeklyTasks
{
    private  $signed;
    private  $weekNo;
    private  $days = array();

    public function __construct($arr)
    {
        if(count($arr) > 0){
            $this->update($arr);
        }
    }
    /**
     * @return int
     */
    public function getWeekNo(): int
    {
        return $this->weekNo;
    }

    /**
     * @param int $weekNo
     */
    public function setWeekNo(int $weekNo): void
    {
        $this->weekNo = $weekNo;
    }

    /**
     * @return bool
     */
    public function isSigned(): bool
    {
        return $this->signed;
    }

    /**
     * @param bool $signed
     */
    public function setSigned(bool $signed): void
    {
        $this->signed = $signed;
    }

    /**
     * @return array
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @param DailyTask $day
     */
    public function setDay(DailyTask $day): void
    {
        array_push($this->days,$day);
    }//array

    private function update($arr)
    {
        $this->setWeekNo($arr["week_number"]);
        $this->setSigned($arr["signed"]);
        $days = $arr["days"];
        foreach ($days as $day){
            $dayObj = new DailyTask($day);
            $this->setDay($dayObj);
        }
    }


}
