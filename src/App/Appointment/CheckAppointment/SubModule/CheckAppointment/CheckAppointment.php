<?php

namespace App\Appointment\CheckAppointment\SubModule\CheckAppointment;

use App\Appointment\CheckAppointment\Module;
use App\Appointment\CheckAppointment\Operation;
use App\Appointment\CheckAppointment\SubModule\BaseOperation;

class CheckAppointment extends Module
{
    private $timestart_appointment;
    private $timeend_appointment;
    private $jenis_appointment;

    public function __construct(string $timestart_appointment, string $timeend_appointment, string $jenis_appointment = '1')
    {
        $this->timestart_appointment = $timestart_appointment;
        $this->timeend_appointment = $timeend_appointment;
        $this->jenis_appointment = $jenis_appointment;
    }

    public function getInstance(): Operation
    {
        $instance = new BaseOperation($this->timestart_appointment, $this->timeend_appointment, $this->jenis_appointment);
        $instance->setObjectBuilder($this);

        return $instance;
    }
}
