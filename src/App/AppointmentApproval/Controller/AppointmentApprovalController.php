<?php

namespace App\AppointmentApproval\Controller;

use App\Appointment\CheckAppointment\SubModule\CheckAppointment\CheckAppointment;
use App\AppointmentApproval\Model\Appointment;
use App\AppointmentApproval\Model\AppointmentDetail;
use App\Ruangan\Model\Ruangan;
use App\Users\Model\Users;
use App\Zoom\Model\Zoom;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AppointmentApprovalController
{
    public $appointment;
    public $appointment_detail;
    public $users;
    public $zoom;
    public $ruangan;

    public function __construct()
    {
        $this->appointment = new Appointment();
        $this->appointment_detail = new AppointmentDetail();
        $this->users = new Users();
        $this->zoom = new Zoom();
        $this->ruangan = new Ruangan();
    }

    public function index(Request $request)
    {
        $datas = $this->appointment
            ->leftJoin('users', 'users.id_user', '=', 'appointment.id_user')
            ->paginate(10);

        return render_template('admin/appointment/index', compact('datas'));
    }

    public function create(Request $request)
    {
        $users = $this->users->get();
        $zoom = $this->zoom->get();
        $ruangan = $this->ruangan->get();

        return render_template('admin/appointment/create', compact('users', 'zoom', 'ruangan'));
    }

    public function check(Request $request)
    {
        $check_appointment = new CheckAppointment(
            $request->get('timestart_appointment'),
            $request->get('timeend_appointment')
        );
        $check_appointment->add('1', new Zoom());
        $check_appointment->add('2', new Ruangan());
        $check_appointment->usingBothOption();

        return new JsonResponse(['datas' => $check_appointment->check()]);
    }

    public function store(Request $request)
    {
        $create = $this->appointment->insert($request->request->all());

        $request->request->set('id_appointment', $create);
        $this->appointment_detail->insert($request->request->all());

        return new RedirectResponse('/admin/appointment-approval');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');

        $detail = $this->appointment
            ->leftJoin('appointment_detail', 'appointment_detail.id_appointment', '=', 'appointment.id_appointment')
            ->where('appointment.id_appointment', $id)
            ->first();
        $users = $this->users->get();
        $zoom = $this->zoom->get();
        $ruangan = $this->ruangan->get();

        return render_template('admin/appointment/edit', compact('detail', 'users', 'zoom', 'ruangan'));
    }

    public function update(Request $request)
    {
        return new RedirectResponse('/home');
    }

    public function delete(Request $request)
    {
        return new RedirectResponse('/home');
    }
}