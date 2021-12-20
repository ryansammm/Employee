<?php

namespace App\CmsFonts\Controller;

use App\CmsFonts\Model\CmsFonts;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsFontsController
{
    public $cmsFonts;
    public $media;

    public function __construct()
    {
        $this->cmsFonts = new CmsFonts();
        $this->media = new Media();
    }

    public function index(Request $request)
    {

        return render_template('home/index', []);
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {
        $file = $request->files->get('cms_font_file');
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $request->request->set('cms_font_name', $fileName);
        $create = $this->cmsFonts->insert($request->request->all());

        $this->media->path('fonts')->useOriginalName()->storeMedia($file, [
            'id_relation' => $create,
            'jenis_dokumen' => 'cms_font',
        ]);

        if ($request->request->get('redirect_to') != null) {
            return new RedirectResponse($request->request->get('redirect_to'));
        }

        return new RedirectResponse('/admin/fonts');
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
}
