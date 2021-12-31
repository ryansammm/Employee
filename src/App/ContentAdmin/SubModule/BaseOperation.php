<?php

namespace App\ContentAdmin\SubModule;

use App\ContentAdmin\ModuleOperation;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\Request;

class BaseOperation implements ModuleOperation
{
    private $request;
    private $model;
    private $method;

    public function __construct(Request $request, $model, string $method)
    {
        $this->request = $request;
        $this->model = $model;
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function index()
    {
        $request = $this->request;
        $kategori = $this->model->category()->get();
        $id_kategori = $this->request->query->get($this->model->queryString());

        $datas = $this->model
            ->leftJoin($this->model->category()->table, $this->model->category()->table . '.' . $this->model->category()->primaryKey, '=', $this->model->table . '.' . $this->model->category()->primaryKey)
            ->where(function ($query) use ($request) {
                if ($request->query->get($this->model->queryString()) != null) {
                    $query->where($this->model->table . '.' . $this->model->category()->primaryKey, $request->query->get($this->model->queryString()));
                }
            })
            ->paginate(10)->appends([$this->model->queryString() => $this->request->query->get($this->model->queryString())]);

        return get_defined_vars();
    }

    public function detail()
    {
        $id = $this->request->attributes->get("id");
        $data = $this->model
            ->leftJoin('media', 'media.id_relation', '=', $this->model->table.'.'.$this->model->primaryKey)
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_produk', $id)->first();
        $data_kategori = $this->model->category()->get();

        $media = new Media();
        $foto_lainnya = $media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        return get_defined_vars();
    }
}