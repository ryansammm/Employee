<?php

namespace App\CmsTitle\Controller;

use App\CmsBackground\Model\CmsBackground;
use App\CmsTitle\Model\CmsTitle;
use App\Media\Model\Media;
use App\Role\Model\Role;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsTitleController
{
    public $model;

    public function __construct()
    {
        $this->model = new CmsTitle();
    }

    public function index()
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        $cms_title = new CmsTitle();
        $data_cms_title = $cms_title->first();

        $cms_background = new CmsBackground();
        $data_cms_background = $cms_background->first();

        $media = new Media();
        $data_media = $media->where('jenis_dokumen', 'cms-title')->first();

        $role = new Role();
        $data_role = $role->get();

        return render_template('admin/auth/login-template', ['errors' => $errors, 'data_cms_title' => $data_cms_title, 'data_media' => $data_media, 'data_cms_background' => $data_cms_background, 'role' => $data_role]);
    }

    public function update(Request $request)
    {
        $media = new Media();
        $title = $this->model->first();

        $option = $request->request->get('title-option');

        if ($option == '1') {

            $media->updateMedia($request->request->get('logoPerusahaan'), [
                'id_relation' => '',
                'jenis_dokumen' => 'cms-title',
            ], $this->model, '');
        } elseif ($option == '2') {

            if ($title != false) {
                $this->model->where('id_cms_title', $title['id_cms_title'])->delete();
            }
            $create = $this->model->insert($request->request->all());
        } else {
            if ($title != false) {
                $this->model->where('id_cms_title', $title['id_cms_title'])->delete();
            }
            $create = $this->model->insert($request->request->all());

            $media->updateMedia($request->request->get('logoPerusahaan'), [
                'id_relation' => '',
                'jenis_dokumen' => 'cms-title',
            ], $this->model, '');
        }

        if ($request->request->get('redirect_to') != null) {
            return new RedirectResponse($request->request->get('redirect_to'));
        }

        return new RedirectResponse('/admin/login-template');
    }
}
