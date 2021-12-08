<div class="col-md-3">
    <div class="card mb-3">
        <div class="card-body">
            <div style="background-color: white;padding: 5px 0 5px 0;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Kategori</h5>
                </div>
                <hr>
            </div>
            <ul class="nav flex-column category" style="font-size: 14px;">
                <?php foreach ($datas_kategori_produk->items as $key => $value) { ?>
                    <li class="nav-item border-bottom mb-2 text-kategori">
                        <?php if (arr_offset($cms_kategori_style, 'icon_kategori') != null && $cms_kategori_style['cms_use_icon'] == '1') { ?>
                            <img src="/assets/media/<?= arr_offset($cms_kategori_style, 'icon_kategori') ?>" class="d-inline icon-kategori" alt="">
                        <?php } ?>
                        <a class="nav-link p-0 text-dark d-inline" href="/product/<?= $value['id_kategori_produk'] ?>/kategori"><?= $value['nama_kategori_produk'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!------- Banner ------->
    <div class="card">
        <div class="card-body p-0">
            <img class="w-100" src="/assets/media/sidebanner.png" alt="">
            <div></div>
        </div>
    </div>
</div>