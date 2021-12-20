<?php

namespace App\Jabatan\Controller;

use App\Jabatan\Model\Jabatan;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class JabatanController
{
    public $jabatan;

    public function __construct()
    {
        $this->jabatan = new Jabatan();
    }

    public function index(Request $request)
    {
        $datas = $this->jabatan->paginate(10);

        return render_template('admin/jabatan/index', compact('datas'));
    }

    public function create(Request $request)
    {
        return render_template('admin/jabatan/create');
    }

    public function store(Request $request)
    {
        $create = $this->jabatan->insert($request->request->all());

        return new RedirectResponse('/admin/jabatan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail = $this->jabatan->where('id_jabatan', $id)->first();

        return render_template('admin/jabatan/edit', compact('detail'));
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->jabatan->where('id_jabatan', $id)->update($request->request->all());

        return new RedirectResponse('/admin/jabatan');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->jabatan->where('id_jabatan', $id)->delete();

        return new RedirectResponse('/admin/jabatan');
    }
}
