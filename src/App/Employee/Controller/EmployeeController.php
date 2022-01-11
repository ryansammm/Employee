<?php

namespace App\Employee\Controller;

use App\Employee\Model\Employee;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class EmployeeController
{
    public $model;

    public function __construct()
    {
        $this->model = new Employee();
    }

    public function index(Request $request)
    {

        return render_template('public/employee/index', []);
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

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

    public function detail(Request $request)
    {


        return render_template('public/employee/detail', []);
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
