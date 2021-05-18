<?php


namespace App\Models;


class DailyTask
{
private  $task;
private  $date;
private  $editable;

    public function __construct($arr)
    {
        if(count($arr) > 0){
            $this->update($arr);
        }
    }
    /**
     * @return string
     */
    public function getTask(): string
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask(string $task): void
    {
        $this->task = $task;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * @param bool $editable
     */
    public function setEditable(bool $editable): void
    {
        $this->editable = $editable;
    }

    private function update($arr)
    {
        $this->setDate($arr["date"]);
        $this->setTask($arr["task"]);
        $this->setEditable($arr["editable"]);
    }


}
