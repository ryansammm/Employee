<?php

namespace App\Divisi\Controller;

use App\Media\Model\Media;
use App\Divisi\Model\Divisi;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DivisiController
{
    public $model;

    public function __construct()
    {
        $this->model = new Divisi();
    }

    public function index(Request $request)
    {

        $datas = $this->model
            ->orderBy('nama_divisi', 'asc')
            ->paginate(10);

        return render_template('admin/divisi/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {

        return render_template('admin/divisi/create', []);
    }

    public function store(Request $request)
    {

        $create = $this->model
            ->insert($request->request->all());


        return new RedirectResponse('/admin/divisi');
    }

    public function edit(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->model
            ->where('id_divisi', $id)
            ->first();

        return render_template('admin/divisi/edit', ['detail' => $detail]);
    }

    public function update(Request $request)
    {

        $id = $request->attributes->get('id');

        $update = $this->model->where('id_divisi', $id)->update($request->request->all());

        return new RedirectResponse('/admin/divisi');
    }

    public function detail(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->model
            ->where('id_table', $id)
            ->first();

        return render_template('home/detail', ['detail' => $detail]);
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        $delete = $this->model->where('id_divisi', $id)->delete();

        return new RedirectResponse('/admin/divisi');
    }
}
