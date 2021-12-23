<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/komentar-berita" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Komentar Berita</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Komentar Berita</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Komentar Berita</a></li>
                        <li class="breadcrumb-item active">Edit Data Komentar Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/komentar-berita/<?= arr_offset($detail, 'id_berita_comment') ?>/update" method="POST">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="">Berita</label>
                                    <textarea class="form-control" disabled><?= $detail['judul_berita'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Komentar</label>
                                    <textarea name="comment_text" class="form-control"><?= $detail['comment_text'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="d-block">Status</label>
                                    <?= $detail['approval'] == '1' ? 'Disetujui' : 'Tidak Disetujui' ?>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="d-block">Setujui Komentar</label>
                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_konfirmasi_approve" data-id="<?= $detail['id_berita_comment'] ?>">Setujui</a>
                                    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_konfirmasi_disapprove" data-id="<?= $detail['id_berita_comment'] ?>">Tolak</a>
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

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setujui Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Setujui komentar berita ini?
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();
                                        document.getElementById('form_approve').submit();">
                    Ya
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="" method="POST" id="form_approve" style="display: none;">

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal_konfirmasi_approve').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_approve').attr('action', '/admin/komentar-berita/' + id + '/approve/1')
    })
</script>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_disapprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Komentar Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tolak komentar berita ini?
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();
                                        document.getElementById('form_disapprove').submit();">
                    Ya
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="" method="POST" id="form_disapprove" style="display: none;">

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal_konfirmasi_disapprove').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_disapprove').attr('action', '/admin/komentar-berita/' + id + '/approve/2')
    })
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>