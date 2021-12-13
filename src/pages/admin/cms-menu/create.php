<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/menu" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Tambah Data Menu</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Menu</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Menu</a></li>
                        <li class="breadcrumb-item active">Tambah Data Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/menu/store" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="container mt-4">
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">Submenu dari menu?</label>
                                    <select name="parent_id" class="form-control">
                                        <option value=""> -- Pilih Parent Menu -- </option>
                                        <?php foreach ($parent_menu->items as $key => $data) { ?>
                                            <option value="<?= $data['id_cms_menu'] ?>"><?= $data['menu'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="menu" class="form-label">Nama Menu *</label>
                                    <input type="text" class="form-control" name="menu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="have_sub" class="form-label d-block">Mempunyai sub menu? *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="have_sub" class="have_sub" value="1" required> Ya
                                    </div>
                                    <input type="radio" name="have_sub" class="have_sub" value="2" required> Tidak
                                </div>
                                <div class="mb-3 tipe d-none">
                                    <label for="tipe" class="form-label">Jenis Menu *</label>
                                    <select name="tipe" class="form-control tipe" required disabled>
                                        <option value=""> -- Pilih Jenis Menu -- </option>
                                        <option value="1">Halaman</option>
                                        <option value="2">Link</option>
                                        <option value="3">Halaman Statik</option>
                                    </select>
                                </div>
                                <div class="mb-3 link_url d-none">
                                    <label for="link_url" class="form-label">Link Url *</label>
                                    <input type="text" class="form-control" name="link_url" required disabled>
                                </div>
                                <div class="mb-3 link_url_opened d-none">
                                    <label for="link_url_opened" class="form-label">Buka Link di? *</label>
                                    <select name="link_url_opened" class="form-control" required disabled>
                                        <option value="1">Tab baru</option>
                                        <option value="2">Halaman yang sama</option>
                                    </select>
                                </div>
                                <div class="mb-3 halaman_id d-none">
                                    <label for="halaman_id" class="form-label">Halaman *</label>
                                    <select name="halaman_id" class="form-control" required disabled>
                                        <option value=""> -- Pilih Halaman -- </option>
                                        <option value="1">Halaman Baru</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="footer" class="form-label d-block">Muncul di Footer? *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="footer" value="1" required> Ya
                                    </div>
                                    <input type="radio" name="footer" value="2" required> Tidak
                                </div>
                                <div class="mb-3">
                                    <label for="header" class="form-label d-block">Muncul di Header? *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="header" value="1" required> Ya
                                    </div>
                                    <input type="radio" name="header" value="2" required> Tidak
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
                    $('.link_url').addClass('d-none');
                    $('.link_url').find('input').prop('disabled', true);

                    $('.link_url_opened').addClass('d-none');
                    $('.link_url_opened').find('select').prop('disabled', true);

                    $('.halaman_id').removeClass('d-none');
                    $('.halaman_id').find('select').prop('disabled', false);
                } else {
                    // link dan halaman
                    $('.link_url').removeClass('d-none');
                    $('.link_url').find('input').prop('disabled', false);

                    $('.link_url_opened').removeClass('d-none');
                    $('.link_url_opened').find('select').prop('disabled', false);

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