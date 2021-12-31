<?php

namespace App\Appointment\Controller;

use App\Appointment\Model\Appointment;
use App\Ruangan\Model\Ruangan;
use App\Zoom\Model\Zoom;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AppointmentController
{
    public $appointment;
    public $zoom;
    public $ruangan;

    public function __construct()
    {
        $this->appointment = new Appointment();
        $this->zoom = new Zoom();
        $this->ruangan = new Ruangan();
    }

    public function index(Request $request)
    {
        $datas = $this->appointment->get();
        $datas_zoom = $this->zoom->get();
        $datas_ruangan = $this->ruangan->get();

        return render_template('public/appointment/index', ['datas' => $datas, 'datas_zoom' => $datas_zoom, 'datas_ruangan' => $datas_ruangan]);
    }

    public function get(Request $request)
    {
        $datas = $this->appointment
            ->leftJoin('appointment_detail', 'appointment_detail.id_appointment', '=', 'appointment.id_appointment')
            ->get();

        foreach ($datas->items as $key => $value) {
            $datas->items[$key]['title'] = $value['agenda_appointment'];

            if ($value['time_option'] == 1) {
                $datas->items[$key]['start'] = date_format(date_create($value['timestart_appointment']), 'Y-m-d H:i:s');
                $datas->items[$key]['end'] = date_format(date_create($value['timeend_appointment']), 'Y-m-d H:i:s');
            } else {
                $datas->items[$key]['start'] = date_format(date_create($value['timestart_appointment']), 'Y-m-d');
                $datas->items[$key]['end'] = date_format(date_create($value['timeend_appointment']), 'Y-m-d');
            }
        }

        return new JsonResponse(['datas' => $datas]);
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get('id');

        $detail = $this->appointment
            ->leftJoin('appointment_detail', 'appointment_detail.id_appointment', '=', 'appointment.id_appointment')
            ->leftJoin('zoom', 'zoom.id_zoom', '=', 'appointment_detail.id_zoom')
            ->where('appointment.id_appointment', $id)
            ->first();

        $detail['title'] = $detail['agenda_appointment'];

        if ($detail['time_option'] == 1) {
            $detail['start'] = date_format(date_create($detail['timestart_appointment']), 'Y-m-d H:i:s');
            $detail['end'] = date_format(date_create($detail['timeend_appointment']), 'Y-m-d H:i:s');
        } else {
            $detail['start'] = date_format(date_create($detail['timestart_appointment']), 'Y-m-d');
            $detail['end'] = date_format(date_create($detail['timeend_appointment']), 'Y-m-d');
        }

        return new JsonResponse(['detail' => $detail]);
    }
}
