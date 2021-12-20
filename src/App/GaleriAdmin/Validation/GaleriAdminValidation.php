<?php

namespace App\GaleriAdmin\Validation;

use Core\Validation;
use Symfony\Component\HttpFoundation\Request;

class GaleriAdminValidation extends Validation
{
    public function __construct(Request $request)
    {
        $this->validation = $this;
        $this->request = $request;
    }

    public function rules()
    {
        return [
            'id_kategori_galeri:Kategori Galeri' => ['required'],
            'judul_galeri:Judul Galeri' => ['required'],
            'tgl_galeri:Tanggal Upload' => ['required'],
            'galeri_foto:Cover Galeri' => ['required', 'uploadextension(allowed:jpg,png,jpeg)', 'uploadsize(size:2M)'],
        ];
    }

    public function messages()
    {
        return [
            'id_kategori_galeri.required' => '{label} harus diisi',
            'judul_galeri.required' => '{label} harus diisi',
            'tgl_galeri.required' => '{label} harus diisi',
            'galeri_foto.required' => '{label} harus diisi',
            'galeri_foto.uploadextension' => 'Format file yang diperbolehkan {file_extensions}',
            'galeri_foto.uploadsize' => 'Ukuran maksimum file adalah {size}'
        ];
    }
}
