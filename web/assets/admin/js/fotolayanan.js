$(document).ready(function () {
    $(".tambahformfoto").on('click', function () {
        let lastId = $(".listfoto:last").attr('id');
        let numberLastId = parseInt(lastId.split('_')[1]) + 1;

        let elementFormFoto = `
            <div class="col-2 listfoto pt-3" id="listfoto_${numberLastId}">
                <h6>Foto ${numberLastId}</h6>
                <input type="file" class="form-control" name="layanan_foto[]">
                <button type="button" class="btn btn-sm btn-danger hapusformfoto mb-2 mt-2" id="hapuslistfoto_${numberLastId}">Hapus</button>
            </div>
        `;

        $(".listFormFoto").append(elementFormFoto);
    });

    $(document).on('click', '.hapusformfoto', function () {
        let idButton = $(this).attr("id");
        let numberId = idButton.split('_')[1];

        const idFormFoto = "#listfoto_" + numberId;

        $(idFormFoto).remove();
    });
});