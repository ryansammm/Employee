<?php

namespace App\Users\Controller;

use App\Role\Model\Role;
use App\Users\Model\Users;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class UsersController
{
    public $model;

    public function __construct()
    {
        $this->model = new Users();
    }

    public function index(Request $request)
    {
        $data_pengguna = $this->model
            ->paginate(10);

        return render_template('admin/pengguna/index', ['data_pengguna' => $data_pengguna]);
    }

    public function create(Request $request)
    {
        $roles = new Role();

        $datas_roles = $roles
            ->orderBy('nama_role', 'ASC')
            ->get();

        return render_template('admin/pengguna/create', ['datas_roles' => $datas_roles]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        // $request->request->set('id_user', SessionData::get('id_user'));
        $request->request->set('password_user', password_hash($request->request->get('password_user'), PASSWORD_DEFAULT));

        /* ------------------------------ Create Produk ----------------------------- */
        $create = $this->model->insert($request->request->all());


        return new RedirectResponse('/admin/pengguna');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $users = $this->model->where('id_user', $id)
            ->first();

        $roles = new Role();
        $datas_roles = $roles
            ->orderBy('nama_role', 'ASC')
            ->get();

        return render_template('admin/pengguna/edit', ['users' => $users, 'datas_roles' => $datas_roles]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $request->request->set('password_user', password_hash($request->request->get('password_user'), PASSWORD_DEFAULT));

        $this->model->where('id_user', $id)->update($request->request->all());

        return new RedirectResponse('/admin/pengguna');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_user', $id)->delete();

        return new RedirectResponse('/admin/pengguna');
    }
}
