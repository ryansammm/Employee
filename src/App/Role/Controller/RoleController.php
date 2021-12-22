<?php

namespace App\Role\Controller;

use App\Role\Model\Role;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class RoleController
{
    public $model;

    public function __construct()
    {
        $this->model = new Role();
    }

    public function index(Request $request)
    {

        $datas_roles = $this->model
            ->get();

        return render_template('admin/roles/index', ['datas_roles' => $datas_roles]);
    }

    public function create(Request $request)
    {

        return render_template('admin/roles/create', []);
    }

    public function store(Request $request)
    {

        $create = $this->model->insert($request->request->all());


        return new RedirectResponse('/admin/roles');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $roles = $this->model->where('id_role', $id)->first();

        return render_template('admin/roles/edit', ['roles' => $roles]);
    }

    public function update(Request $request)
    {

        $id = $request->attributes->get("id");

        $this->model->where('id_role', $id)->update($request->request->all());

        return new RedirectResponse('/admin/roles');
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get("id");
        $this->model->where('id_role', $id)->delete();

        return new RedirectResponse('/admin/roles');
    }
}
