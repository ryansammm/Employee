<?php

namespace App\Bidang\Controller;

use App\Media\Model\Media;
use App\Bidang\Model\Bidang;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BidangController
{
    public $model;

    public function __construct()
    {
        $this->model = new Bidang();
    }

    public function index(Request $request)
    {

        $datas = $this->model
            ->orderBy('nama_bidang', 'asc')
            ->paginate(10);

        return render_template('admin/bidang/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {

        return render_template('admin/bidang/create', []);
    }

    public function store(Request $request)
    {

        $create = $this->model
            ->insert($request->request->all());


        return new RedirectResponse('/admin/bidang');
    }

    public function edit(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->model
            ->where('id_bidang', $id)
            ->first();

        return render_template('admin/bidang/edit', ['detail' => $detail]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $update = $this->model->where('id_bidang', $id)->update($request->request->all());

        return new RedirectResponse('/admin/bidang');
    }

    public function detail(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->model
            ->where('id_bidang', $id)
            ->first();


        return render_template('home/detail', ['detail' => $detail]);
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        $delete = $this->model->where('id_bidang', $id)->delete();

        return new RedirectResponse('/admin/bidang');
    }
}
