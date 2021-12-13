<?php

namespace App\Contact\Validation;

use Core\Validation;
use Symfony\Component\HttpFoundation\Request;

class ContactValidation extends Validation
{
    public function __construct(Request $request)
    {
        $this->validation = $this;
        $this->request = $request;
    }

    public function rules()
    {
        return [
            'name:Nama Lengkap' => ['required', 'fullname'],
            'email:Email' => ['required', 'email'],
            'phone:Nomor Handphone' => ['required', 'length(min:11,max:12)'],
            'company:Perusahaan' => ['required', 'fullname'],
            'subject:Subjek' => ['required', 'fullname'],
            'pesan:Pesan' => ['required', 'fullname'],
            // 'gambar_thumbnail_berita:Cover Berita' => ['required', 'uploadextension(allowed:jpg,png,jpeg)'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '{label} harus diisi',
            'name.fullname' => '{label} harus nama lengkap',
            'email.required' => '{label} harus diisi',
            'email.email' => '{label} harus email',
            'phone.required' => '{label} harus diisi',
            'phone.length' => '{label} harus nomor',
            'company.required' => '{label} harus diisi',
            'company.fullname' => '{label} harus lengkap dan nyata',
            'subject.required' => '{label} harus diisi',
            'subject.fullname' => '{label} harus lengkap dan nyata',
            'pesan.required' => '{label} harus diisi',
            'pesan.fullname' => '{label} harus lengkap dan nyata',
        ];
    }
}
