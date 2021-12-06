<?php

namespace App\BeritaAdmin\Validation;

use Core\Validation;
use Symfony\Component\HttpFoundation\Request;

class BeritaValidation extends Validation
{
    public function __construct(Request $request)
    {
        $this->validation = $this;
        $this->request = $request;
    }

    public function rules()
    {
        return [
            'tgl_publish:Tanggal Publish' => ['required'],
            'id_kategori_berita:Kategori Berita' => ['required'],
            'judul_berita:Judul Berita' => ['required', 'minlength(min:2)'],
            // 'gambar_thumbnail_berita:Cover Berita' => ['required', 'uploadextension(allowed:jpg,png,jpeg)'],
        ];
    }

    public function messages()
    {
        return [
            'tgl_publish' => '{label} harus diisi',
            'id_kategori_berita' => '{label} harus diisi',
            'judul_berita' => '{label} harus diisi',
            'gambar_thumbnail_berita.allowed' => 'Format file yang diperbolehkan {file_extensions}',
            'gambar_thumbnail_berita.max' => 'Ukuran maksimum file adalah {size}'
        ];
    }
}
