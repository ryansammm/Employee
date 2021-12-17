<?php include __DIR__ . '/../Header.php' ?>

<div class="container">
    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Pencarian</h5>
    <h6 class="fw-normal mb-3">Hasil Pencarian dari keyword : <span class="ms-2"><?= isset($search) ? $search : '' ?></span></h6>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <?php if ($search != null && $search != '') { ?>
                    <div class="row">
                        <?php foreach ($result->items as $key => $data) { ?>
                            <div class="col-12 mb-4">
                                <input type="hidden" class="link_page" value="<?= arr_offset($data, 'http_referer') ?>">
                                <a href="<?= arr_offset($data, 'http_referer') ?>" class="text-decoration-none">
                                    <small class="d-block text-dark"><?= arr_offset($data, 'http_referer') ?></small>
                                    <h5 class="text-dark truncate-string-1 mb-0"><?= arr_offset($data, 'search_title') ?></h5>
                                    <div class="text-muted pt-0"><small class="truncate-string-2"><?= html_entity_decode(arr_offset($data, 'search_description')) ?></small></div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="text-center">
                        <h5>Pencarian tidak ditemukan!</h5>
                        <p>Silahkan cari menggunakan keyword lain</p>
                    </div>
                <?php } ?>

                <?= $result->links() ?>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../Footer.php' ?>