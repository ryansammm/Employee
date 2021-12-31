<?php

namespace App\VideoAdmin\Controller;

use App\VideoAdmin\Model\VideoAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class VideoAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new VideoAdmin();
    }

    public function index(Request $request)
    {
        $data_video = $this->model
            ->paginate(10);

        return render_template('admin/video/index', ['data_video' => $data_video]);
    }

    public function create(Request $request)
    {

        return render_template('admin/video/create', []);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('link_video', str_replace('watch?v=', 'embed/', $request->request->get('link_video')));
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Produk ----------------------------- */
        $create = $this->model->insert($request->request->all());


        return new RedirectResponse('/admin/video');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $video = $this->model->where('id_video', $id)->first();

        return render_template('admin/video/edit', ['video' => $video]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $request->request->set('link_video', str_replace('watch?v=', 'embed/', $request->request->get('link_video')));
        $this->model->where('id_video', $id)->update($request->request->all());

        return new RedirectResponse('/admin/video');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_video', $id)->delete();

        return new RedirectResponse('/admin/video');
    }
}
