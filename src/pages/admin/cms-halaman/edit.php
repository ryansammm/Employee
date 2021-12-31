<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/halaman" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Data Halaman</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Halaman</a></li>
                        <li class="breadcrumb-item active">Edit Data Halaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/halaman/<?= arr_offset($halaman, 'id_cms_halaman') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="container mt-4">
                                <div class="mb-3">
                                    <label for="cms_halaman" class="form-label">Nama Halaman *</label>
                                    <input type="text" class="form-control" name="cms_halaman" required value="<?= arr_offset($halaman, 'cms_halaman') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="cms_row" class="form-label">Layout Halaman</label>

                                    <?php foreach ($halaman['row'] as $key_row => $data) { ?>
                                        <?php $key = $key_row += 1 ?>
                                        <!-- row -->
                                        <div class="card row-content">
                                            <div class="card-header">
                                                <h3 class="card-title">Baris ke-<?= $key ?></h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="">Kolom baris</label>
                                                            <select name="row[<?= $key ?>][cms_row_col]" class="form-control cms_row_col" required>
                                                                <option value=""> -- Pilih Kolom -- </option>
                                                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                    <?php if (12 % $i == 0) { ?>
                                                                        <option value="<?= $i ?>" <?= $i == arr_offset($data, 'cms_row_col') ? 'selected' : '' ?>>1 Baris <?= $i ?> kolom</option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="mb-3">
                                                            <label for="">Urutan</label>
                                                            <input type="number" name="row[<?= $key ?>][cms_row_order]" min="1" class="form-control" required value="<?= arr_offset($data, 'cms_row_order') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <label for="" class="d-block">Sembunyikan baris</label>
                                                            <div class="d-inline mr-2">
                                                                <input type="radio" name="row[<?= $key ?>][cms_row_hide]" value="1" required <?= arr_offset($data, 'cms_row_hide') == '1' ? 'checked' : '' ?>> Ya
                                                            </div>
                                                            <input type="radio" name="row[<?= $key ?>][cms_row_hide]" value="2" required <?= arr_offset($data, 'cms_row_hide') == '2' ? 'checked' : '' ?>> Tidak
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="" class="d-block">Menggunakan Container?</label>
                                                            <div class="d-inline mr-2">
                                                                <input type="radio" name="row[<?= $key ?>][cms_row_container]" value="1" required <?= arr_offset($data, 'cms_row_container') == '1' ? 'checked' : '' ?>> Ya
                                                            </div>
                                                            <input type="radio" name="row[<?= $key ?>][cms_row_container]" value="2" required <?= arr_offset($data, 'cms_row_container') == '2' ? 'checked' : '' ?>> Tidak
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="accordion column-container" id="accordionExample">
                                                            <?php foreach ($data['column'] as $key1 => $data1) { ?>
                                                                <?php $key1 = $key1 += 1 ?>
                                                                <!-- column -->
                                                                <div class="card">
                                                                    <div class="card-header p-0">
                                                                        <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapse<?= $key ?>_<?= $key1 ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>_<?= $key1 ?>">
                                                                                Kolom <?= $key1 ?>
                                                                                <i class="fas fa-sort-down ml-2"></i>
                                                                            </button>
                                                                        </h2>
                                                                    </div>
                                                                    <div id="collapse<?= $key ?>_<?= $key1 ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <label for="" class="font-weight-normal">Komponen</label>
                                                                                    <select name="row[<?= $key ?>][column][<?= $key1 ?>][id_cms_component]" class="form-control" required>
                                                                                        <option value=""> -- Pilih Komponen -- </option>
                                                                                        <?php foreach ($component->items as $key_comp => $comp) { ?>
                                                                                            <option value="<?= $comp['id_cms_component'] ?>" <?= $comp['id_cms_component'] == arr_offset($data1, 'id_cms_component')['id_cms_component'] ? 'selected' : '' ?>><?= $comp['cms_component'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-1">
                                                                                    <label for="" class="font-weight-normal">Urutan</label>
                                                                                    <input type="number" name="row[<?= $key ?>][column][<?= $key1 ?>][cms_col_order]" class="form-control" required value="<?= arr_offset($data1, 'cms_col_order') ?>">
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <div class="mb-3">
                                                                                        <label for="" class="d-block font-weight-normal">Sembunyikan kolom</label>
                                                                                        <div class="d-inline mr-2">
                                                                                            <input type="radio" name="row[<?= $key ?>][column][<?= $key1 ?>][cms_col_hide]" value="1" required <?= arr_offset($data1, 'cms_col_hide') == '1' ? 'checked' : '' ?>> Ya
                                                                                        </div>
                                                                                        <input type="radio" name="row[<?= $key ?>][column][<?= $key1 ?>][cms_col_hide]" value="2" required <?= arr_offset($data1, 'cms_col_hide') == '2' ? 'checked' : '' ?>> Tidak
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="mb-3">
                                                                                        <label for="" class="d-block font-weight-normal">Menggunakan Container?</label>
                                                                                        <div class="d-inline mr-2">
                                                                                            <input type="radio" name="row[<?= $key ?>][column][<?= $key1 ?>][cms_col_container]" value="1" required <?= arr_offset($data1, 'cms_col_container') == '1' ? 'checked' : '' ?>> Ya
                                                                                        </div>
                                                                                        <input type="radio" name="row[<?= $key ?>][column][<?= $key1 ?>][cms_col_container]" value="2" required <?= arr_offset($data1, 'cms_col_container') == '2' ? 'checked' : '' ?>> Tidak
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- column -->
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($key_row > 1) { ?>
                                                    <button type="button" class="btn btn-sm btn-danger mt-3 btn-block btn-remove-row"><i class="fas fa-trash-alt"></i> Hapus Baris</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- row -->
                                    <?php } ?>

                                    <div class="row-container"></div>
                                    <button type="button" class="btn btn-primary btn-add-row">
                                        <i class="fas fa-plus-square"></i>
                                        Buat baris baru
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        var row_count = 1;
        var form_row_elem_list = new function() {
            this.row_count = 1,
                this.generate = function() {
                    var elem = '';
                    elem += '<!-- form row --><div class="col-6"><div class="mb-3"><label for="">Kolom baris</label><select name="row[' + this.row_count + '][cms_row_col]" class="form-control cms_row_col" required><option value=""> -- Pilih Kolom -- </option>'

                    for (let index = 1; index <= 12; index++) {
                        if (12 % index == 0) {
                            elem += '<option value="' + index + '"' + (index == 1 ? 'selected' : '') + '>1 Baris ' + index + ' kolom</option>';
                        }
                    }

                    elem += '</select></div></div><div class="col-2"><div class="mb-3"><label for="">Urutan</label><input type="number" name="row[' + this.row_count + '][cms_row_order]" min="1" class="form-control" value="1" required></div></div><div class="col-2"><div class="mb-3"><label for="" class="d-block">Sembunyikan baris</label><div class="d-inline mr-2"><input type="radio" name="row[' + this.row_count + '][cms_row_hide]" value="1" required> Ya</div><input type="radio" name="row[' + this.row_count + '][cms_row_hide]" value="2" required checked> Tidak</div></div><!-- form row -->'

                    return elem;
                }
        };
        var form_column_elem_list = new function() {
            this.row_count = 1,
                this.column_count = 1,
                this.generate = function() {
                    var elem = '';
                    elem += '<!-- form column --><div class="card"><div class="card-header p-0"><h2 class="mb-0"><button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapse' + this.row_count + '_' + this.column_count + '" aria-expanded="true" aria-controls="collapse' + this.row_count + '_' + this.column_count + '">Kolom ' + this.column_count + '</button></h2></div><div id="collapse' + this.row_count + '_' + this.column_count + '" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample"><div class="card-body"><div class="row"><div class="col-6"><label for="" class="font-weight-normal">Komponen</label><select name="row[' + this.row_count + '][column][' + this.column_count + '][id_cms_component]" class="form-control" required><option value=""> -- Pilih Komponen -- </option>';

                    <?php foreach ($component->items as $key => $data) { ?>
                        elem += '<option value="<?= $data['id_cms_component'] ?>"><?= $data['cms_component'] ?></option>';
                    <?php } ?>

                    elem += '</select></div><div class="col-2"><label for="" class="font-weight-normal">Urutan</label><input type="number" name="row[' + this.row_count + '][column][' + this.column_count + '][cms_col_order]" class="form-control" value="' + this.column_count + '" required></div><div class="col-3"><div class="mb-3"><label for="" class="d-block font-weight-normal">Sembunyikan kolom</label><div class="d-inline mr-2"><input type="radio" name="row[' + this.row_count + '][column][' + this.column_count + '][cms_col_hide]" value="1" required> Ya</div><input type="radio" name="row[' + this.row_count + '][column][' + this.column_count + '][cms_col_hide]" value="2" required checked> Tidak</div></div></div></div></div></div><!-- form column -->'

                    return elem;
                }
        };
        var row_elem_list = new function() {
            this.row_count = 1,
                this.row_elem1 = function() {
                    return '<!-- row --><div class="card row-content"><div class="card-header"><h3 class="card-title">Baris ke-' + this.row_count + '</h3></div><div class="card-body"><div class="row">'
                },
                this.row_elem2 = function() {
                    return '<div class="col-12"><div class="accordion column-container" id="accordionExample">'
                },
                this.row_elem3 = function() {
                    return '</div></div></div>'
                },
                this.row_elem4 = function() {
                    return '<button type="button" class="btn btn-sm btn-danger mt-3 btn-block btn-remove-row"><i class="fas fa-trash-alt"></i> Hapus Baris</button>'
                },
                this.row_elem5 = function() {
                    return '</div></div><!-- row -->'
                }
        };

        $('.btn-add-row').on('click', function() {
            row_count = $('.row-content').length + 1;

            // instansiasi object
            var form_row_elem_list_obj = form_row_elem_list;
            var form_column_elem_list_obj = form_column_elem_list;
            var row_elem_list_obj = row_elem_list;

            // atur value row_count property
            form_row_elem_list_obj.row_count = row_count;
            form_column_elem_list_obj.row_count = row_count;
            row_elem_list_obj.row_count = row_count;

            var row_elem = row_elem_list_obj.row_elem1();

            var form_row_elem = form_row_elem_list_obj.generate();

            row_elem += form_row_elem;
            row_elem += row_elem_list_obj.row_elem2();

            var form_column = form_column_elem_list_obj.generate();

            row_elem += form_column;
            row_elem += row_elem_list_obj.row_elem3();
            row_elem += row_elem_list_obj.row_elem4();
            row_elem += row_elem_list_obj.row_elem5();

            $('.row-container').append(row_elem);
        });

        $(document).on('click', '.btn-remove-row', function() {
            $(this).closest('.row-content').remove();

            $('.row-content').each(function(index) {
                $(this).find('.card-header h3').text('Baris ke-' + (index + 1));
            })
        });

        $(document).on('change', '.cms_row_col', function() {
            // instansiasi object
            var form_column_elem_list_obj = form_column_elem_list;

            var val = parseInt($(this).val());
            var current_card = $(this).closest('.row-content');

            // atur value row_count property
            form_column_elem_list_obj.row_count = $('.row-content').index(current_card) + 1;

            var form_colum = '';
            for (let index = 0; index < val; index++) {
                form_column_elem_list_obj.column_count = index + 1;
                form_colum += form_column_elem_list_obj.generate();
            }
            current_card.find('.column-container').html(form_colum);
        })
    });
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>