<?php if ($cms_kategori_style != false) { ?>
<style>
    <?php if (arr_offset($cms_kategori_style, 'font_face') != null) { ?>
    @font-face {
        font-family: <?= $cms_kategori_style['cms_font_name'] ?>;
        src: url('/assets/fonts/<?= $cms_kategori_style['font_face'] ?>');
    }
    <?php } ?>

    .text-kategori a {
        color: <?= $cms_kategori_style['cms_font_color'] ?> !important;
        <?php if (arr_offset($cms_kategori_style, 'font_face') != null) { ?>
        font-family: <?= $cmsKategoriStyle->fontFamily(arr_offset($cms_kategori_style, 'cms_font_name')) ?>;
        <?php } ?>
        font-weight: <?= $cmsKategoriStyle->fontWeight($cms_kategori_style['cms_font_weight']) ?>;
        font-size: <?= $cms_kategori_style['cms_font_size'] . '' . $cmsKategoriStyle->fontSizeUnit($cms_kategori_style['cms_font_size_unit']) ?>;
    }

    .text-kategori a:hover {
        color: <?= $cms_kategori_style['cms_font_color_hover'] ?> !important;
    }

    .text-kategori {
        background-color: <?= $cms_kategori_style['cms_bg_color'] ?>;
    }

    .text-kategori:hover {
        background-color: <?= $cms_kategori_style['cms_bg_color_hover'] ?> !important;
    }

    .icon-kategori {
        width: 17px;
        margin-bottom: 4px;
        margin-right: 5px;
    }
</style>
<?php } ?>