$(document).ready(function(){
    $(".tambahformfoto").on('click', function(){
        let lastId = $(".listfoto:last").attr('id');
        let numberLastId = parseInt(lastId.split('_')[1]) + 1;

        let elementFormFoto = `
            <div class="listfoto pt-3" id="listfoto_${numberLastId}">
                <h5>Foto ${numberLastId}</h5>
                <div class="row">
                    <div class="col-md-6 mb-2">

                        <label for="" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul_groupgaleri[]">
                    </div>
                    <div class="col-12 mb-2">

                        <label for="" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi_groupgaleri[]" class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Upload Galeri</label> <span class="text-muted font-weight-light" style="font-size: 14px;">(.jpg, .jpeg, .png)</span>
                    <input type="file" class="form-control" name="upload_galeri[]">
                    <span class="text-muted font-weight-light" style="font-size: 14px;">Ukuran maksimum file : 2 Mb</span>
                </div>
                <button type="button" class="btn btn-danger hapusformfoto mb-2" id="hapuslistfoto_${numberLastId}">Hapus</button>
            </div>
        `;

        $(".listFormFoto").append(elementFormFoto);
    });

    $(document).on('click', '.hapusformfoto',function(){
        let idButton = $(this).attr("id");
        let numberId = idButton.split('_')[1];

        const idFormFoto = "#listfoto_" + numberId;

        $(idFormFoto).remove();
    });
});