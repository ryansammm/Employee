<?php include __DIR__ . '/../Header.php' ?>

<!-- page dinamis -->
<div class="container">
    <?php foreach ($data_halaman['row'] as $key => $row) { ?>
        <?php if ($row['cms_row_container'] == '1') { ?>
            <div class="card mb-2">
                <div class="card-body">
                <?php } ?>
                <div class="row mb-2">
                    <?php foreach ($row['column'] as $key1 => $column) { ?>
                        <div class="col-<?= 12 / $row['cms_row_col'] ?>">
                            <?php if ($column['cms_col_container'] == '1') { ?>
                                <div class="card mb-2">
                                    <div class="card-body">
                                    <?php } ?>
                                    <?= html_entity_decode(nl2br($column['id_cms_component']['cms_component_content'])) ?>
                                    <?php if ($column['cms_col_container'] == '1') { ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($row['cms_row_container'] == '1') { ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<?php include __DIR__ . '/../Footer.php' ?>