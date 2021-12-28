<?php

namespace App\AppointmentApproval\Model;

use App\Appointment\CheckAppointment\SubModule\CheckAppointment\CheckAppointmentInterface;
use Core\Model;

class Appointment extends Model implements CheckAppointmentInterface
{
    protected $table = 'appointment';
    protected $primaryKey = 'id_appointment';

    public function tableDetail(): Model
    {
        return new AppointmentDetail();
    }
}
