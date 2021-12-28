<?php

namespace App\Appointment\Controller;

use App\Appointment\Model\Appointment;
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
        $this->model->get();

        return render_template('public/appointment/index', []);
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

        $datas = $this->model->get();

        foreach ($datas->items as $key => $value) {
            $datas->items[$key]['title'] = $value['agenda_appointment'];
            $datas->items[$key]['start'] = $value['timestart_appointment'];
            $datas->items[$key]['end'] = $value['timeend_appointment'];
        }


        return new JsonResponse(['datas' => $datas]);
    }
}
