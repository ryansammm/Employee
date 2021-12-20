<?php

namespace App\Halaman\Controller;

use App\CmsHalaman\Model\CmsHalaman;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class HalamanController
{
    public $cmsHalaman;

    public function __construct()
    {
        $this->cmsHalaman = new CmsHalaman();
    }

    public function index(Request $request)
    {
        $halaman = $this->cmsHalaman->leftJoin('cms_menu', 'cms_menu.halaman_id', '=', 'cms_halaman.id_cms_halaman')->where('link_url', $request->attributes->get('page_url'))->first();
        $data_halaman = $this->cmsHalaman->getHalamanData($halaman['id_cms_halaman']);

        return render_template('public/cms-halaman/page', compact('data_halaman'));
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

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
