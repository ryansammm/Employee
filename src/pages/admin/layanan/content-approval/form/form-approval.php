<!-- form approval -->
<div class="container">
    <hr>
    <div class="row mt-3">
        <div class="col-12">
            <h4>Approval Data</h4>
            <form method="POST" action="/admin/layanan/approval/<?= $layanan['id_layanan'] ?>/action/5">
                <p>Setujui perubahan konten diatas?</p>
                <button type="submit" class="btn btn-sm btn-success">Setujui</button>
            </form>
        </div>
    </div>
</div>