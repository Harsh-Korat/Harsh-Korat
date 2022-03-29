<?php

class ServiceSchedulingController{
    function __construct()
    {
        include('../Models/Helperland-model.php');
        $this->model = new Helperland();

    }

    public function getScheduleDetail(){
        $email = $_SESSION['username'];

        $result1 = $this->model->ResetKey($email);
        $UserId = $result1[3];

        $result = $this->model->ServiceSchedule($UserId);
        return $result;

    }
}

?>