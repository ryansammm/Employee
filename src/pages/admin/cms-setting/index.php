<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengaturan Umum Website
                        <!-- <a href="/admin/profil/create" class="btn btn-sm btn-outline-primary">Add New</a> -->
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pengaturan Umum Website</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <form action="/admin/setting-website/update" method="POST" enctype="multipart/form-data">
                            <h5 class="border-bottom">Halaman Login</h5>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Menggunakan header</label>
                                <select name="header_cms_setting" class="form-control">
                                    <option value="1" <?= arr_offset($datas, 'header_cms_setting') == '1' ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= arr_offset($datas, 'header_cms_setting') == '2' ? 'seelcted' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Menggunakan footer</label>
                                <select name="footer_cms_setting" class="form-control">
                                    <option value="1" <?= arr_offset($datas, 'footer_cms_setting') == '1' ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= arr_offset($datas, 'footer_cms_setting') == '2' ? 'seelcted' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            <h5 class="border-bottom mt-5">Berita</h5>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tampilkan fitur like berita</label>
                                <select name="cms_like_berita" class="form-control">
                                    <option value="1" <?= arr_offset($datas, 'cms_like_berita') == '1' ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= arr_offset($datas, 'cms_like_berita') == '2' ? 'selected' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tampilkan fitur comment berita</label>
                                <select name="cms_comment_berita" class="form-control">
                                    <option value="1" <?= arr_offset($datas, 'cms_comment_berita') == '1' ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= arr_offset($datas, 'cms_comment_berita') == '2' ? 'selected' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tampilkan jumlah view berita</label>
                                <select name="cms_view_berita" class="form-control">
                                    <option value="1" <?= arr_offset($datas, 'cms_view_berita') == '1' ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= arr_offset($datas, 'cms_view_berita') == '2' ? 'selected' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            <button type="reset" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
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


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>