<?php

namespace App\Appointment\CheckAppointment\SubModule;

use App\Appointment\CheckAppointment\Operation;
use App\AppointmentApproval\Model\Appointment;

class BaseOperation implements Operation
{
    private $appointment;
    private $timestart_appointment;
    private $timeend_appointment;
    private $jenis_appointment;
    private $objectBuilder;

    public function __construct(string $timestart_appointment, string $timeend_appointment, string $jenis_appointment = '1')
    {
        $this->appointment = new Appointment();
        $this->timestart_appointment = $timestart_appointment;
        $this->timeend_appointment = $timeend_appointment;
        $this->jenis_appointment = $jenis_appointment;
    }

    public function setObjectBuilder(ObjectBuilder $object_builder): void
    {
        $this->objectBuilder = $object_builder;
    }

    public function objectColumMatcher()
    {
        $this->objectBuilder->isEmpty();

        foreach ($this->objectBuilder->getObject() as $key => $value) {
            $object_model = $value['model'];
            $appointment_detail = $this->appointment->tableDetail();
            if (!$appointment_detail->columnExists($object_model->primaryKey)) {
                echo 'Column Mismatch : ';
                echo 'Column <b>' . $object_model->primaryKey . '</b> not exists at <b>'.$appointment_detail->table.'</b> table<br>';
                die();
            }
        }
    }

    public function getAppointment()
    {
        $this->objectColumMatcher();

        $option = $this->objectBuilder->getOption();
        $type = $this->jenis_appointment;
        $data_appointment = $this->appointment
            ->leftJoin('appointment_detail', 'appointment_detail.id_appointment', '=', 'appointment.id_appointment')
            ->where('timestart_appointment', '<=', $this->timestart_appointment)
            ->where('timeend_appointment', '>=', $this->timeend_appointment)
            ->where(function($query) use ($option, $type) {
                if ($option == false) {
                    $query->where('jenis_appointment', $type);
                }
            })
            ->get()->items;

        return $data_appointment;
    }

    public function checkObject(array $object, $type = null)
    {
        $list_object = $object['model']->get();
        $list_object_count = $object['model']->count();
        
        foreach ($this->getAppointment() as $key => $value) {
            foreach ($list_object->items as $key1 => $value1) {
                if ($value[$object['model']->primaryKey] == $value1[$object['model']->primaryKey]) {
                    $list_object_count--;
                    $list_object->items[$key1]['used'] = true;
                }
            }
        }
        $type = $type != null ? $type : $this->jenis_appointment;
        if ($list_object_count == 0) {
            $this->objectBuilder->setObject($type, 'message', 'Tidak tersedia');
        }
        $this->objectBuilder->setObject($type, 'result', $list_object->items);
    }

    public function findObject(string $type)
    {
        foreach ($this->objectBuilder->getObject() as $key => $value) {
            if ($value['type'] == $type) {
                return $value;
            }
        }

        echo 'Object not found : Please check your <b>jenis_appointment</b> parameter value<br><br>';
        echo 'Please use <b>usingBothOption</b> method at <b>CheckAppointment</b> class if you want to use all the object<br>';
        die();
    }

    public function getAvailableObject()
    {
        $this->objectBuilder->isEmpty();

        if ($this->objectBuilder->getOption() == false) {
            $this->checkObject($this->findObject($this->jenis_appointment));
        } else {
            foreach ($this->objectBuilder->getObject() as $key => $value) {
                $this->checkObject($value, $value['type']);
            }
        }

        return $this->objectBuilder->getObject();
    }
}