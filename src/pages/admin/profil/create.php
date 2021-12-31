<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Profil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Profil</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Profil</a></li>
                        <li class="breadcrumb-item active">Tambah Data Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <form action="/admin/profil/store" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Judul Profil ------->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul_profil" class="form-label">Judul Profil</label>
                                    <input type="text" class="form-control" id="judul_profil" name="judul_profil">
                                </div>
                            </div>
                            <!------- Deskripsi Profil ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_profil" class="form-label">Deskripsi Profil</label>
                                    <textarea id="deskripsi_profil" name="deskripsi_profil"></textarea>
                                </div>
                            </div>
                            <!------- Foto Profil ------->
                            <div class="col-md-4">
                                <label for="profil_foto" class="form-label">Foto Profil</label> (.jpg, .jpeg, .png)
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="profil_foto">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
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



<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>