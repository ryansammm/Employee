<!-- form approval -->
<div class="container">
    <hr>
    <div class="row mt-3">
        <div class="col-12">
            <h4>Approval Data</h4>
            <p>Setujui perubahan konten diatas?</p>
            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_konfirmasi_approval" data-id="<?= $value['id_layanan'] ?>" data-status="5">Setujui</a>
            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_konfirmasi_approval" data-id="<?= $value['id_layanan'] ?>" data-status="4">Tolak</a>
        </div>
    </div>
</div>

<!-- Modal Approval -->
<div class="modal fade" id="modal_konfirmasi_approval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="pesan_approval">Apakah anda yakin untuk mengubah status publish layanan ini?</span>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('form_approval').submit();">
                    Ya
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="" method="POST" id="form_approval" style="display: none;"></form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal_konfirmasi_approval').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var status = button.data('status')

        var modal = $(this)
        modal.find('.modal-title').html(status == '5' ? 'Setujui Data' : 'Tolak Data');
        modal.find('#form_approval').attr('action', '/admin/layanan/approval/' + id + '/action/' + status)
    })
</script>
