<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Tampilan Kategori Produk Kami</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Produk Kami</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Kategori</a></li>
                        <li class="breadcrumb-item">Kelola Tampilan Kategori Produk Kami</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/kategori-produk/style/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="cms_font_color" class="form-label d-block">Warna Teks</label>
                                    <input type="color" id="favcolor" name="cms_font_color" value="<?= arr_offset($detail, 'cms_font_color') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_cms_font" class="form-label d-block">Font Teks</label>
                                    <select name="id_cms_font" class="form-control">
                                        <option value=""> -- Pilih Font Teks -- </option>
                                        <?php foreach ($fonts->items as $font) { ?>
                                            <option value="<?= $font['id_cms_font'] ?>" <?= arr_offset($detail, 'id_cms_font') == $font['id_cms_font'] ? 'selected' : '' ?>><?= $font['cms_font_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-plus-square"></i> Tambah Font Baru
                                    </button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="cms_font_weight" class="form-label d-block">Gaya Font Teks</label>
                                    <select name="cms_font_weight" class="form-control">
                                        <option value=""> -- Pilih Gaya Font -- </option>
                                        <option value="1" class="font-weight-normal" <?= arr_offset($detail, 'cms_font_weight') == '1' ? 'selected' : '' ?>>Normal</option>
                                        <option value="2" class="font-weight-bold" <?= arr_offset($detail, 'cms_font_weight') == '2' ? 'selected' : '' ?>>Bold</option>
                                        <option value="3" class="font-italic" <?= arr_offset($detail, 'cms_font_weight') == '3' ? 'selected' : '' ?>>Italic</option>
                                        <option value="4" class="font-weight-light" <?= arr_offset($detail, 'cms_font_weight') == '4' ? 'selected' : '' ?>>Light</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="cms_font_size" class="form-label d-block">Ukuran Font</label>
                                    <input type="number" min="1" class="form-control" name="cms_font_size" value="<?= arr_offset($detail, 'cms_font_size') ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cms_font_size_unit" class="form-label d-block">Satuan Ukuran Font</label>
                                    <select name="cms_font_size_unit" class="form-control">
                                        <option value=""> -- Pilih Satuan -- </option>
                                        <option value="1" <?= arr_offset($detail, 'cms_font_size_unit') == '1' ? 'selected' : '' ?>>cm</option>
                                        <option value="2" <?= arr_offset($detail, 'cms_font_size_unit') == '2' ? 'selected' : '' ?>>mm</option>
                                        <option value="3" <?= arr_offset($detail, 'cms_font_size_unit') == '3' ? 'selected' : '' ?>>in</option>
                                        <option value="4" <?= arr_offset($detail, 'cms_font_size_unit') == '4' ? 'selected' : '' ?>>px</option>
                                        <option value="5" <?= arr_offset($detail, 'cms_font_size_unit') == '5' ? 'selected' : '' ?>>pt</option>
                                        <option value="6" <?= arr_offset($detail, 'cms_font_size_unit') == '6' ? 'selected' : '' ?>>pc</option>
                                        <option value="7" <?= arr_offset($detail, 'cms_font_size_unit') == '7' ? 'selected' : '' ?>>em</option>
                                        <option value="8" <?= arr_offset($detail, 'cms_font_size_unit') == '8' ? 'selected' : '' ?>>rem</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <?php if (arr_offset($detail, 'path_media') != null) { ?>
                                        <div class="col-2">
                                            <img src="/assets/media/<?= arr_offset($detail, 'path_media') ?>" class="img-fluid img-thumbnail">
                                        </div>
                                    <?php } ?>
                                    <div class="col">
                                        <label for="cms_icon_kategori" class="form-label">Icon Kategori</label> (.jpg, .jpeg, .png)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="cms_icon_kategori">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                            <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                        </div>
                                        <span class="d-block">Menggunakan Ikon?</span>
                                        <div class="mr-2 d-inline">
                                            <input type="radio" name="cms_use_icon" value="1" <?= arr_offset($detail, 'cms_use_icon') == '1' ? 'checked' : '' ?>> Ya
                                        </div>
                                        <input type="radio" name="cms_use_icon" value="2" <?= arr_offset($detail, 'cms_use_icon') == '2' ? 'checked' : '' ?>> Tidak
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="mb-3">
                                    <label for="cms_bg_color" class="form-label d-block">Warna Background Teks</label>
                                    <input type="color" id="favcolor" name="cms_bg_color" value="<?= arr_offset($detail, 'cms_bg_color') ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="cms_font_color_hover" class="form-label d-block">Warna Teks Saat Di Hover</label>
                                    <input type="color" id="favcolor" name="cms_font_color_hover" value="<?= arr_offset($detail, 'cms_font_color_hover') ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="cms_bg_color_hover" class="form-label d-block">Warna Background Teks Saat Di Hover</label>
                                    <input type="color" id="favcolor" name="cms_bg_color_hover" value="<?= arr_offset($detail, 'cms_bg_color_hover') ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="cms_side_menu_position" class="form-label d-block">Posisi Menu</label>
                                    <select name="cms_side_menu_position" class="form-control">
                                        <option value=""> -- Pilih Posisi -- </option>
                                        <option value="1" <?= arr_offset($detail, 'cms_side_menu_position') == '1' ? 'selected' : '' ?>>Kiri</option>
                                        <option value="2" <?= arr_offset($detail, 'cms_side_menu_position') == '2' ? 'selected' : '' ?>>Kanan</option>
                                    </select>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Font Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_fonts_store" action="/admin/fonts/store" method="POST" enctype="multipart/form-data">
                    <label for="cms_font_file" class="form-label">Upload File Font</label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="cms_font_file" required>
                        <span class="text-muted">Ukuran maksimum file : 1 Mb</span>
                    </div>
                    <input type="hidden" name="redirect_to" value="/admin/kategori-produk/style">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_fonts_store">Upload</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn_fonts_store').click(function() {
            $('#form_fonts_store').submit();
        });
    });
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>