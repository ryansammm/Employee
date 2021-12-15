<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/banner" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Banner</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Banner</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Banner</a></li>
                        <li class="breadcrumb-item active">Tambah Data Banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/banner/store" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_banner" class="form-label">Nama Banner</label>
                                    <input type="text" class="form-control" id="nama_banner" name="nama_banner">
                                </div>
                                <div class="mb-3">
                                    <label for="">Orientasi Banner</label>
                                    <select name="orientasi_banner" class="form-control orientasi_banner">
                                        <option value="1">Potrait</option>
                                        <option value="2">Lanscape</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Lokasi Banner Dimunculkan</label>
                                    <select name="lokasi_banner" class="form-control lokasi_banner">
                                        <option value=""> -- Pilih Lokasi Banner -- </option>
                                        <?php foreach ($menu->items as $key => $value) { ?>
                                            <option value="<?= $value['link_url'] ?>"><?= $value['menu'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="foto_banner" class="form-label">Foto Banner</label> (.jpg, .jpeg, .png)
                                    <input type="file" class="form-control" id="foto_banner" name="foto_banner">
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                    <?php if (isset($errors['foto_banner'])) { ?>
                                        <span class="text-danger d-block"><b><?= $errors['foto_banner'] ?></b></span>
                                    <?php } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="d-block">Sembunyikan Banner?</label>
                                    <input type="radio" name="ishide_banner" value="1"> Ya
                                    <input type="radio" name="ishide_banner" value="2" class="ml-2" checked> Tidak
                                </div>
                                <div class="mb-3">
                                    <label for="">Urutan Banner</label>
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Atur Urutan Banner Berdasarkan Lokasi dan Orientasi Banner
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Banner</th>
                                                                <th scope="col">Thumbnail</th>
                                                                <th scope="col">Urutan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="body-table-banner">

                                                        </tbody>
                                                        <tbody>
                                                            <tr class="bg-light">
                                                                <td style="width: 400px;" colspan="3"><b>Banner yang akan ditambakan</b></td>
                                                                <td><input type="number" min="1" name="urutan_banner" class="form-control" placeholder="urutan" style="width: 100px;" value=""></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>

<!-- Modal Dokumen -->
<div class="modal fade" id="dokumenPersyaratan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Dokumen ORMAS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none">
                <iframe src="" frameborder="0" id="fileSakipPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/app/file-preview.js"></script>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#isi_berita_ind').summernote({
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
    });
</script>
<script src="/assets/js/app/banner.js"></script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>