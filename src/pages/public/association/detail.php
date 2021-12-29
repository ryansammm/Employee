<?php include __DIR__ . '/../Header.php' ?>

<style>
    ul li.list-group-item {
        font-size: 14px !important;
    }

    ul li.list-group-item span {
        width: 50%;
        text-align: end;
    }
</style>

<!------- Asosiasi ------->
<section id="asosiasi">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                            <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $detail['nama_asosiasi'] ?></h4>
                        </div>
                        <hr>
                        <div class="text-center">
                            <img src="/assets/media/<?= $detail['path_media'] ?>" alt="" style="width: 15%;border-radius: 0.25rem;">
                        </div>
                        <hr>
                        <h6 class="mt-4">Deskripsi</h6>
                        <div class="mt-3">
                            <p class="px-3" style="font-size: 14px;"><?= $detail['deskripsi_asosiasi'] ?></p>
                        </div>

                    </div>
                    <div class="card-footer d-grid gap-2 d-flex justify-content-md-end">
                        <a htype="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary me-2">Lihat Dokumen</a>
                        <a href="" target="_blank" class="btn btn-primary">Link Eksternal</a>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $detail['nama_asosiasi'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed src="/assets/media/<?= $detail_pdf['path_media'] ?>" width="100%" height="420px" type="application/pdf">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../Footer.php' ?>