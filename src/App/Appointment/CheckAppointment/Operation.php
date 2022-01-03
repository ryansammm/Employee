<?php

namespace App\Appointment\CheckAppointment;

use App\Appointment\CheckAppointment\SubModule\ObjectBuilder;

interface Operation
{
    public function getAppointment();
    public function getAvailableObject();
    public function setObjectBuilder(ObjectBuilder $object_builder) : void;
}