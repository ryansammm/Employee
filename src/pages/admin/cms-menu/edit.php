<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/menu" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Data Menu</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Menu</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Menu</a></li>
                        <li class="breadcrumb-item active">Edit Data Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/menu/<?= arr_offset($detail, 'id_cms_menu') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="container mt-4">
                                <div class="mb-3">
                                    <label for="menu" class="form-label">Nama Menu *</label>
                                    <input type="text" class="form-control" name="menu" required value="<?= arr_offset($detail, 'menu') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="have_sub" class="form-label d-block">Mempunyai sub menu? *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="have_sub" class="have_sub" value="1" required <?= arr_offset($detail, 'have_sub') == '1' ? 'checked' : '' ?>> Ya
                                    </div>
                                    <input type="radio" name="have_sub" class="have_sub" value="2" required <?= arr_offset($detail, 'have_sub') == '2' ? 'checked' : '' ?>> Tidak
                                </div>
                                <div class="mb-3 tipe <?= arr_offset($detail, 'have_sub') == '1' ? 'd-none' : '' ?>">
                                    <label for="tipe" class="form-label">Jenis Menu *</label>
                                    <select name="tipe" class="form-control tipe" required <?= arr_offset($detail, 'have_sub') == '1' ? 'disabled' : '' ?>>
                                        <option value=""> -- Pilih Jenis Menu -- </option>
                                        <option value="1" <?= arr_offset($detail, 'tipe') == '1' ? 'selected' : '' ?>>Halaman</option>
                                        <option value="2" <?= arr_offset($detail, 'tipe') == '2' ? 'selected' : '' ?>>Link</option>
                                        <option value="3" <?= arr_offset($detail, 'tipe') == '3' ? 'selected' : '' ?>>Halaman Statik</option>
                                    </select>
                                </div>
                                <div class="mb-3 link_url <?= arr_offset($detail, 'have_sub') == '1' ? 'd-none' : '' ?>">
                                    <label for="link_url" class="form-label">Link Url *</label>
                                    <input type="text" class="form-control" name="link_url" required <?= arr_offset($detail, 'have_sub') == '1' ? 'disabled' : '' ?> value=<?= arr_offset($detail, 'link_url') ?>>
                                </div>
                                <div class="mb-3 link_url_opened <?= arr_offset($detail, 'have_sub') == '1' ? 'd-none' : '' ?>">
                                    <label for="link_url_opened" class="form-label">Buka Link di? *</label>
                                    <select name="link_url_opened" class="form-control" required <?= arr_offset($detail, 'have_sub') == '1' ? 'disabled' : '' ?>>
                                        <option value="1" <?= arr_offset($detail, 'link_url_opened') == '1' ? 'selected' : '' ?>>Tab baru</option>
                                        <option value="2" <?= arr_offset($detail, 'link_url_opened') == '2' ? 'selected' : '' ?>>Halaman yang sama</option>
                                    </select>
                                </div>
                                <div class="mb-3 halaman_id <?= arr_offset($detail, 'have_sub') == '1' || arr_offset($detail, 'tipe') != '1' ? 'd-none' : '' ?>">
                                    <label for="halaman_id" class="form-label">Halaman *</label>
                                    <select name="halaman_id" class="form-control" required <?= arr_offset($detail, 'have_sub') == '1' || arr_offset($detail, 'tipe') != '1' ? 'disabled' : '' ?>>
                                        <option value=""> -- Pilih Halaman -- </option>
                                        <?php foreach ($halaman->items as $key => $data) { ?>
                                            <option value="<?= $data['id_cms_halaman'] ?>" <?= arr_offset($detail, 'halaman_id') == $data['id_cms_halaman'] ? 'selected' : '' ?>><?= $data['cms_halaman'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="footer" class="form-label d-block">Muncul di Footer? *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="footer" value="1" required <?= arr_offset($detail, 'footer') == '1' ? 'checked' : '' ?>> Ya
                                    </div>
                                    <input type="radio" name="footer" value="2" required <?= arr_offset($detail, 'footer') == '2' ? 'checked' : '' ?>> Tidak
                                </div>
                                <div class="mb-3">
                                    <label for="header" class="form-label d-block">Muncul di Header? *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="header" value="1" required <?= arr_offset($detail, 'header') == '1' ? 'checked' : '' ?>> Ya
                                    </div>
                                    <input type="radio" name="header" value="2" required <?= arr_offset($detail, 'header') == '2' ? 'checked' : '' ?>> Tidak
                                </div>
                                <div class="mb-3">
                                    <label for="">Title Halaman</label>
                                    <input type="text" name="title" class="form-control" value="<?= arr_offset($detail, 'title') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control"><?= arr_offset($detail, 'meta_description') ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('.tipe').on('change', function() {
            if ($(this).val() != '') {
                if ($(this).val() == '1') {
                    // halaman

                    $('.link_url').removeClass('d-none');
                    $('.link_url').find('input').prop('disabled', false);

                    $('.link_url_opened').removeClass('d-none');
                    $('.link_url_opened').find('select').prop('disabled', false);

                    $('.halaman_id').removeClass('d-none');
                    $('.halaman_id').find('select').prop('disabled', false);
                } else {
                    // link dan halaman

                    $('.halaman_id').addClass('d-none');
                    $('.halaman_id').find('select').prop('disabled', true);
                }
            }
        });

        $('.have_sub').on('click', function() {
            if ($(this).val() == '2') {
                $('.tipe').removeClass('d-none');
                $('.tipe').find('select').prop('disabled', false);
            } else {
                $('.tipe').addClass('d-none');
                $('.tipe').find('select').prop('disabled', true);

                $('.link_url').addClass('d-none');
                $('.link_url').find('input').prop('disabled', true);

                $('.link_url_opened').addClass('d-none');
                $('.link_url_opened').find('select').prop('disabled', true);

                $('.halaman_id').addClass('d-none');
                $('.halaman_id').find('select').prop('disabled', true);
            }
        });
    });
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>