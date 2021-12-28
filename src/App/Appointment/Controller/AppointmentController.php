<?php

namespace App\Appointment\Controller;

use App\Appointment\Model\Appointment;
use App\AppointmentDetail\Model\AppointmentDetail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AppointmentController
{
    public $model;

    public function __construct()
    {
        $this->model = new Appointment();
    }

    public function index(Request $request)
    {
        $datas = $this->model->get();

        return render_template('public/appointment/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

        $this->model->insert($request->request->all());

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('home/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function get(Request $request)
    {

        $datas = $this->model
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
                // $datas->items[$key]['start'] = $value['timestart_appointment'];
                // $datas->items[$key]['end'] = $value['timeend_appointment'];
            }
        }

        return new JsonResponse(['datas' => $datas]);
    }

    public function detail(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->model
            ->leftJoin('appointment_detail', 'appointment_detail.id_appointment', '=', 'appointment.id_appointment')
            ->where('appointment.id_appointment', $id)
            ->first();

        $detail['title'] = $detail['agenda_appointment'];

        if ($detail['time_option'] == 1) {
            $detail['start'] = date_format(date_create($detail['timestart_appointment']), 'Y-m-d H:i:s');
            $detail['end'] = date_format(date_create($detail['timeend_appointment']), 'Y-m-d H:i:s');
        } else {
            $detail['start'] = date_format(date_create($detail['timestart_appointment']), 'Y-m-d');
            $detail['end'] = date_format(date_create($detail['timeend_appointment']), 'Y-m-d');
            // $detail['start'] = $detail['timestart_appointment'];
            // $detail['end'] = $detail['timeend_appointment'];
        }

        return new JsonResponse(['detail' => $detail]);
    }
}
