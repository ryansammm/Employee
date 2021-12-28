<?php

namespace App\Appointment\CheckAppointment;

interface Operation
{
    public function getAppointment();
    public function getAvailableObject();
}