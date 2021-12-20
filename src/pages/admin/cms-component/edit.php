<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/component" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Data Komponen</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Komponen</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Komponen</a></li>
                        <li class="breadcrumb-item active">Edit Data Komponen</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/component/<?= arr_offset($detail, 'id_cms_component') ?>/update" method="POST" enctype="multipart/form-data" id="form_submit">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="container mt-4">
                                <div class="mb-3">
                                    <label for="cms_component" class="form-label">Nama Komponent *</label>
                                    <input type="text" class="form-control" name="cms_component" required value="<?= arr_offset($detail, 'cms_component') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="cms_component_type" class="form-label d-block">Jenis Komponen *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" class="cms_component_type" name="cms_component_type" value="1" required <?= arr_offset($detail, 'cms_component_type') == '1' ? 'checked' : '' ?>> Dinamis
                                    </div>
                                    <input type="radio" class="cms_component_type" name="cms_component_type" value="2" required <?= arr_offset($detail, 'cms_component_type') == '2' ? 'checked' : '' ?>> Statis
                                </div>
                                <div class="mb-3 cms_component_content <?= arr_offset($detail, 'cms_component_type') != '1' ? 'd-none' : '' ?>">
                                    <label for="cms_component_content" class="form-label">Isi Komponen *</label>
                                    <textarea id="cms_component_content" name="cms_component_content" required><?= arr_offset($detail, 'cms_component_content') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="cms_component_hide" class="form-label d-block">Sembunyikan Halaman *</label>
                                    <div class="d-inline mr-2">
                                        <input type="radio" name="cms_component_hide" value="1" required <?= arr_offset($detail, 'cms_component_hide') == '1' ? 'checked' : '' ?>> Ya
                                    </div>
                                    <input type="radio" name="cms_component_hide" value="2" required <?= arr_offset($detail, 'cms_component_hide') == '2' ? 'checked' : '' ?>> Tidak
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

<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#cms_component_content').summernote({
            placeholder: 'Start writing or type',
            height: 500,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });

        <?php if (arr_offset($detail, 'cms_component_type') != '1') { ?>
            $('#cms_component_content').summernote('disable');
        <?php } ?>

        $('.cms_component_type').on('click', function() {
            if ($(this).val() != '') {
                if ($(this).val() == 1) {
                    $('.cms_component_content').removeClass('d-none');
                    $('#cms_component_content').summernote('enable');
                    $('#cms_component_content').find('textarea').prop('required', true);
                } else {
                    $('.cms_component_content').addClass('d-none');
                    $('#cms_component_content').summernote('disable');
                    $('#cms_component_content').find('textarea').prop('required', false);
                }
            }
        });

    });
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>