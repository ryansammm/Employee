<?php

namespace App\CmsHalaman\Controller;

use App\CmsComponent\Model\CmsComponent;
use App\CmsHalaman\Model\CmsHalaman;
use App\CmsHalamanDetail\Model\CmsHalamanDetail;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsHalamanController
{
    public $cmsHalaman;
    public $cmsComponent;

    public function __construct()
    {
        $this->cmsHalaman = new CmsHalaman();
        $this->cmsComponent = new CmsComponent();
        $this->cmsHalamanDetail = new CmsHalamanDetail();
    }

    public function index(Request $request)
    {
        $datas = $this->cmsHalaman->paginate(10);

        return render_template('admin/cms-halaman/index', compact('datas'));
    }

    public function create(Request $request)
    {
        $component = $this->cmsComponent->get();

        return render_template('admin/cms-halaman/create', compact('component'));
    }

    protected function createHalaman($datas)
    {
        $create_halaman = $this->cmsHalaman->insert($datas);
        foreach ($datas['row'] as $key => $row) {
            if (!empty($row['column'])) {
                foreach ($row['column'] as $key1 => $column) {
                    $data_column = [
                        'id_cms_halaman' => $create_halaman,
                        'cms_row_order' => $row['cms_row_order'],
                        'cms_row_hide' => $row['cms_row_hide'],
                        'cms_col' => 12/intval($row['cms_row_col']),
                        'cms_col_order' => $column['cms_col_order'],
                        'cms_col_hide' => $column['cms_col_hide'],
                        'id_cms_component' => $column['id_cms_component'],
                        'cms_row_container' => $row['cms_row_container'],
                        'cms_col_container' => $column['cms_col_container'],
                    ];
                    $this->cmsHalamanDetail->insert($data_column);
                }
            }
        }

        return $create_halaman;
    }

    public function store(Request $request)
    {
        $datas = $request->request->all();
        $this->createHalaman($datas);

        return new RedirectResponse('/admin/halaman');
    }

    public function edit(Request $request)
    {
        $component = $this->cmsComponent->get();
        $halaman = $this->cmsHalaman->getHalamanData($request->attributes->get('id'));

        return render_template('admin/cms-halaman/edit', compact('component', 'halaman'));
    }

    public function update(Request $request)
    {
        $this->cmsHalamanDetail->where('id_cms_halaman', $request->attributes->get('id'))->delete();
        $this->cmsHalaman->where('id_cms_halaman', $request->attributes->get('id'))->delete();

        $datas = $request->request->all();
        $this->createHalaman($datas);

        return new RedirectResponse('/admin/halaman');
    }

    public function delete(Request $request)
    {
        $this->cmsHalamanDetail->where('id_cms_halaman', $request->attributes->get('id'))->delete();
        $this->cmsHalaman->where('id_cms_halaman', $request->attributes->get('id'))->delete();

        return new RedirectResponse('/admin/halaman');
    }
}
