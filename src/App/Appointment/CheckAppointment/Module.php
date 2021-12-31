<?php

namespace App\Appointment\CheckAppointment;

use App\Appointment\CheckAppointment\SubModule\ObjectBuilder;

abstract class Module extends ObjectBuilder
{
    abstract public function getInstance(): Operation;

    public function check()
    {
        $module = $this->getInstance();
        $module->getAvailableObject();
        
        return $this->getResult();
    }
}