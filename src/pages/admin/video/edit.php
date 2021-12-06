<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/video" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Ubah Data Video</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Video</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Video</a></li>
                        <li class="breadcrumb-item active">Ubah Data Video</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <form action="/admin/video/<?= $video['id_video'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Judul Video ------->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="judul_video" class="form-label">Judul Video</label>
                                    <input type="text" class="form-control" id="judul_video" name="judul_video" value="<?= $video['judul_video'] ?>">
                                </div>
                            </div>
                            <!------- Link Video ------->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link_video" class="form-label">Link Video</label>
                                    <input type="text" class="form-control" id="link_video" name="link_video" value="<?= $video['link_video'] ?>">
                                </div>
                            </div>
                            <!------- Keterangan Video ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="keterangan_video" class="form-label">Keterangan Video(Opsional)</label>
                                    <textarea class="form-control input-message" rows="3" name="keterangan_video"><?= $video['keterangan_video'] ?></textarea>
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