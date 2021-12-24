<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<div class="container mt-3">
    <div class="row">

        <!------- Main Content ------->
        <div class="col-md-8">
            <div class="card rounded p-3" style="border-top: 5px solid #fe4d01;">
                <h4 class="ps-3"><?= $detail_berita['judul_berita'] ?></h4>
                <span class="text-muted ps-3" style="font-size: 12px;"><?= date_format(date_create($detail_berita['tgl_publish']), "j M Y") ?> | <?= $detail_berita['nama_depan'] ?> <?= $detail_berita['nama_belakang'] ?> | <a href="/news/<?= $detail_berita['id_kategori_berita'] ?>/kategori" class="text-muted text-decoration-none"> <?= $detail_berita['kategori_berita'] ?></a></span>
                <div class="mx-3 mt-2" style="box-shadow: 0px 1px 4px 0px #00000033;">
                    <img src="/assets/media/<?= $detail_berita['path_media'] ?>" alt="" style="width: 100%;height: 100%;border-radius: 0.25rem;" class="">
                </div>
                <div class="px-3 mt-3">
                    <?= html_entity_decode(nl2br($detail_berita['isi_berita'])) ?>
                    <!-- <span class="badge" style="background-color: aliceblue;">Opini suara & publik</span> -->
                    <!-- <span class="badge bg-danger">Public Government</span> -->
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                            <div class="col-6 col-md-4 text-center text-grey">
                                <a href="/like-berita/<?= $detail_berita['id_berita'] ?>/store" class="text-dark text-decoration-none">
                                    <i class="bi bi-hand-thumbs-up<?= $like_berita ? '-fill' : '' ?>"></i>
                                    <span><?= num($detail_berita['countlike_berita']) ?></span> Suka
                                </a>
                            </div>
                            <div class="col-6 col-md-4 text-center text-grey">
                                <a href="/dislike-berita/<?= $detail_berita['id_berita'] ?>/store" class="text-dark text-decoration-none">
                                    <i class="bi bi-hand-thumbs-down<?= $dislike_berita ? '-fill' : '' ?>"></i>
                                    <span><?= num($detail_berita['countdislike_berita']) ?></span> Tidak Suka
                                </a>
                            </div>
                        <?php } ?>
                        <div class="col-6 col-md-4 text-center text-grey">
                            <a href="#" class="text-dark text-decoration-none btn-sosmed" data-bs-toggle="modal" data-bs-target="#modalSosmed" data-bs-url="<?= $site_url ?>/informasi/berita/<?= $detail_berita['id_berita'] ?>" data-bs-idBerita="<?= $detail_berita['id_berita'] ?>">
                                <i class="bi bi-share"></i>
                                <span class="countshare-berita"><?= num($detail_berita['countshare_berita']) ?></span> Bagikan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                <div class="card my-2 p-4" id="form_komentar">
                    <?php if (!empty($success)) { ?>
                        <?php foreach ($success as $succ) { ?>
                            <div class="alert alert-success fade show" role="alert">
                                <?= $succ ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <form action="/komentar/<?= $detail_berita['id_berita'] ?>/store" method="POST">
                        <textarea class="form-control" name="comment" rows="5" placeholder="Silahkan tuliskan komentarmu...."></textarea>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary rounded mt-3">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="card my-2">
                    <div class="container py-3">
                        <span><?= count($komentar_berita) ?> Komentar</span>
                        <?php foreach ($komentar_berita as $key => $data) { ?>
                            <div class="row my-3">
                                <div class="col-sm-1">
                                    <div style="background:url(/assets/media/<?= $data['path_media'] ?>);background-size:cover;background-position:center;display:block;width:50px;height:50px;border-radius:50%;"></div>
                                </div>
                                <div class="col-sm-11">
                                    <div class="ms-2">
                                        <div class="d-flex">
                                            <h6 class="text-grey fw-normal" style="font-size:14px;"><?= $data['nama_user'] ?></h6>
                                            <span class="text-muted ps-3" style="font-size: 13px;"><?= posted_at($data['posted_at']) ?></span>
                                        </div>
                                        <p class="" style="font-size:14px;"><?= $data['comment_text'] ?></p>
                                        <a href="/like-komentar/<?= $data['id_berita'] ?>/on/<?= $data['id_berita_comment'] ?>/store" class="pe-2 text-lightgrey text-decoration-none">
                                            <i class="bi bi-hand-thumbs-up<?= $data['countlike_comment'] != null ? '-fill' : '' ?>"></i>
                                            <?= num($data['countlike_comment']) ?>
                                        </a>
                                        <a href="/dislike-komentar/<?= $data['id_berita'] ?>/on/<?= $data['id_berita_comment'] ?>/store" class="pe-2 text-lightgrey text-decoration-none">
                                            <i class="bi bi-hand-thumbs-down<?= $data['countdislike_comment'] != null ? '-fill' : '' ?>"></i>
                                            <?= num($data['countdislike_comment']) ?>
                                        </a>

                                        <a class="pe-2 text-lightgrey text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#modal_balas_komentar" data-id="<?= $data['id_berita_comment'] ?>"><i class="far fa-comment me-1"></i><?= $data['countcomment_comment'] ?></a>

                                        <?php if (!empty($data['sub_comment'])) { ?>
                                            <div class="card shadow my-2 p-2">
                                                <span class="ms-2">Balasan</span>
                                                <?php foreach ($data['sub_comment'] as $key => $sub) { ?>

                                                    <div class="row my-3 ms-1">
                                                        <div class="col-sm-1">
                                                            <div style="background:url(/assets/media/<?= $sub['path_media'] ?>);background-size:cover;background-position:center;display:block;width:50px;height:50px;border-radius:50%;"></div>
                                                        </div>
                                                        <div class="col-sm-11">
                                                            <div class="ms-3">
                                                                <div class="d-flex">
                                                                    <h6 class="text-grey fw-normal" style="font-size:14px;"><?= $sub['nama_user'] ?></h6>
                                                                    <span class="text-muted ps-3" style="font-size: 13px;"><?= posted_at($sub['posted_at']) ?></span>
                                                                </div>
                                                                <p class="" style="font-size:14px;"><?= $sub['comment_text'] ?></p>
                                                                <a href="/like-komentar/<?= $sub['id_berita'] ?>/on/<?= $sub['id_berita_comment'] ?>/store" class="pe-2 text-lightgrey text-decoration-none">
                                                                    <i class="bi bi-hand-thumbs-up<?= $sub['countlike_comment'] != null ? '-fill' : '' ?>"></i>
                                                                    <?= num($sub['countlike_comment']) ?>
                                                                </a>
                                                                <a href="/dislike-komentar/<?= $sub['id_berita'] ?>/on/<?= $sub['id_berita_comment'] ?>/store" class="pe-2 text-lightgrey text-decoration-none">
                                                                    <i class="bi bi-hand-thumbs-down<?= $sub['countdislike_comment'] != null ? '-fill' : '' ?>"></i>
                                                                    <?= nuM($sub['countdislike_comment']) ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

        </div>


        <!------- Side Content ------->
        <div class="col-md-4 pe-4">
            <div class="row d-flex align-items-center">

                <!------- Berita Hangat ------->
                <div class="card mb-3 px-0">
                    <div style="background-color: white;padding: 5px 0 5px 0;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Sedang Hangat</h5>
                            <!-- <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" style="height: 558px;padding: 0;">
                            <?php foreach ($data_berita_hangat->items as $key => $value) { ?>
                                <div class="<?= $key == (count($data_berita_hangat->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_berita_hangat->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-md-8 pe-0">
                                            <h6 class="card-title">
                                                <a href="/news/<?= $value['id_berita'] ?>/detail" class="text-decoration-none text-dark truncate-string-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $value['judul_berita'] ?>"><?= $value['judul_berita'] ?></a>
                                            </h6>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="rounded" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: center; width: 100%; height: 80px;"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="row justify-content-around text-side-trending">
                                                <div class="col d-flex">
                                                    <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <i class="bi bi-hand-thumbs-up"></i>
                                                            <span><?= $value['countlike_berita'] > 0 ? $value['countlike_berita'] : 0 ?></span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <i class="bi bi-chat"></i>
                                                            <span><?= $value['countcomment_berita'] > 0 ? $value['countcomment_berita'] : 0 ?></span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (arr_offset($cms_setting, 'cms_view_berita') == '1') { ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <i class="bi bi-eye"></i>
                                                            <span><?= $value['countview_berita'] > 0 ? $value['countview_berita'] : 0 ?></span>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="sub-item" style="margin-top: 2px;">
                                                        <span><?= posted_at($value['posted_at']) ?></span>
                                                    </div>
                                                    <a class="text-decoration-none text-dark pe-1 d-flex btn-share-hangat" type="button" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#modalSosmed" data-id="<?= $value['id_berita'] ?>">
                                                        <div class="me-3 sub-item" style="margin-top: 2px;">
                                                            <i class="fas fa-share"></i>
                                                            <span><?= $value['countshare_berita'] > 0 ? $value['countshare_berita'] : 0 ?></span>
                                                            <span>Bagikan</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>

                <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
                    <!-- Kategori -->
                    <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
                    <!-- Banner Potrait -->
                    <?php if (!empty($GLOBALS['banner_potrait'])) { ?>
                        <?php foreach ($GLOBALS['banner_potrait'] as $key => $data) { ?>
                            <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>


<!------- Model Share ------->
<div class="modal fade" id="modalSosmed" tabindex="-1" aria-labelledby="modalSosmedLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSosmedLabel">Share Berita</h5>
                <button type="button" class="btn btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-2 mb-3">
                        <a href="whatsapp://send?text=http://beta.pancateksindo.co.id<?= $GLOBALS['url'] ?>" class="whatsapp text-decoration-none btn-sosmed-share" data-id="<?= $detail_berita['id_berita'] ?>" target="_blank"><img src="/assets/icon/sosmed/whatsapp.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Whatsapp</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="instagram text-decoration-none btn-sosmed-share" data-id="<?= $detail_berita['id_berita'] ?>" target="_blank"><img src="/assets/icon/sosmed/instagram.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Instagram</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="telegram text-decoration-none btn-sosmed-share" data-id="<?= $detail_berita['id_berita'] ?>" target="_blank"><img src="/assets/icon/sosmed/telegram.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Telegram</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://beta.pancateksindo.co.id<?= $GLOBALS['url'] ?>" class="facebook text-decoration-none btn-sosmed-share" data-id="<?= $detail_berita['id_berita'] ?>" target="_blank"><img src="/assets/icon/sosmed/facebook.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Facebook</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="https://twitter.com/share?url=http://beta.pancateksindo.co.id<?= $GLOBALS['url'] ?>" class="twitter text-decoration-none btn-sosmed-share" data-id="<?= $detail_berita['id_berita'] ?>" target="_blank"><img src="/assets/icon/sosmed/twitter.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Twitter</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="email text-decoration-none btn-sosmed-share" data-id="<?= $detail_berita['id_berita'] ?>" target="_blank"><img src="/assets/icon/sosmed/email.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Email</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Balas Komentar -->
<div class="modal fade" id="modal_balas_komentar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Balas Komentar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/komentar/<?= $detail_berita['id_berita'] ?>/store" method="POST">
                    <input type="hidden" id="parent_comment" name="parent_comment">
                    <textarea class="form-control" name="comment" rows="5" placeholder="Silahkan tuliskan komentarmu...."></textarea>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary rounded mt-3">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#modal_balas_komentar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#parent_comment').val(id)
    })
</script>

<!-- request count share -->
<script>
    function count_share(id) {
        $.ajax({
            url: '/share-berita/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                location.reload();
            }
        });
    }

    $(document).on('click', '.btn-sosmed-share', function() {
        var id = $(this).attr('data-id');
        count_share(id);
    });

    $(document).on('click', '.btn-share-hangat', function() {
        var id = $(this).attr('data-id');
        $(document).find('.btn-sosmed-share').attr('data-id', id);
    });
</script>

<?php include __DIR__ . '/../Footer.php' ?>