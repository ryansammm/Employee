<?php 

namespace App\KategoriProduk\Validation;

use Core\Validation;
use Symfony\Component\HttpFoundation\Request;

class KategoriProdukValidation extends Validation
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
            'id_kategori_berita:Kategori KategoriProduk' => ['required'],
            'judul_berita:Judul KategoriProduk' => ['required', 'minlength(min:2)'],
            // 'gambar_thumbnail_berita:Cover KategoriProduk' => ['required', 'uploadextension(allowed:jpg,png,jpeg)'],
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
