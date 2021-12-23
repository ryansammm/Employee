<?php

namespace Config;

class AppPermissions
{
    protected $permissions = [
        [
            'menu' => 'Profil',
            'aliasPermission' => 'profil',
            'url' => '/profil'
        ],
        [
            'menu' => 'Berita',
            'aliasPermission' => 'berita',
            'url' => '/berita'
        ],
        [
            'menu' => 'Kategori Berita',
            'aliasPermission' => 'kategori-berita',
            'url' => '/kategori-berita'
        ],
        [
            'menu' => 'Produk',
            'aliasPermission' => 'produk',
            'url' => '/produk'
        ],
        [
            'menu' => 'Kategori Produk',
            'aliasPermission' => 'kategori-produk',
            'url' => '/kategori-produk'
        ],
        [
            'menu' => 'Layanan',
            'aliasPermission' => 'layanan',
            'url' => '/layanan'
        ],
        [
            'menu' => 'Kategori Layanan',
            'aliasPermission' => 'kategori-layanan',
            'url' => '/kategori-layanan'
        ],
        [
            'menu' => 'Galeri',
            'aliasPermission' => 'galeri',
            'url' => '/galeri'
        ],
        [
            'menu' => 'Kategori Galeri',
            'aliasPermission' => 'kategori-galeri',
            'url' => '/kategori-galeri'
        ],
        [
            'menu' => 'Video',
            'aliasPermission' => 'video',
            'url' => '/video'
        ],
        [
            'menu' => 'Banner',
            'aliasPermission' => 'banner',
            'url' => '/banner'
        ],
        [
            'menu' => 'Pelanggan',
            'aliasPermission' => 'pelanggan',
            'url' => '/pelanggan'
        ],
        [
            'menu' => 'Akreditasi',
            'aliasPermission' => 'akreditasi',
            'url' => '/akreditasi'
        ],
        [
            'menu' => 'Asosiasi',
            'aliasPermission' => 'asosiasi',
            'url' => '/asosiasi'
        ],
        [
            'menu' => 'Kontak',
            'aliasPermission' => 'kontak',
            'url' => '/kontak'
        ],
        [
            'menu' => 'Sosial Media',
            'aliasPermission' => 'sosial-media',
            'url' => '/sosial-media'
        ],
        [
            'menu' => 'Pengguna',
            'aliasPermission' => 'pengguna',
            'url' => '/pengguna'
        ],
        [
            'menu' => 'Roles',
            'aliasPermission' => 'roles',
            'url' => '/roles'
        ],
        [
            'menu' => 'Karyawan',
            'aliasPermission' => 'karyawan',
            'url' => '/karyawan'
        ],
        [
            'menu' => 'Jabatan',
            'aliasPermission' => 'jabatan',
            'url' => '/jabatan'
        ],
        [
            'menu' => 'Profile Team',
            'aliasPermission' => 'profile-team',
            'url' => '/profile-team'
        ],

    ];

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getOnePermission($alias)
    {
        foreach ($this->permissions as $key => $value) {
            if ($value['aliasPermission'] == $alias) {
                return $value;
            }
        }

        return [];
    }
}
