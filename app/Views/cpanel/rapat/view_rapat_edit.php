<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<!-- Start of Content -->
<?= userTabMenu($tabs); ?>

<!-- Start of Form -->
<div class="container">
    <div class="toolbar my-5">
        <strong> Tambah Data Rapat</strong>
    </div>
    <div class="toolbar my-5 place-right">
        <a href="<?php echo base_url('rapat') ?>" class="button primary outline"><span class="mif-undo"></span> Kembali</a>
    </div>
    <div class="row">
        <div class="cell-12 my-5">
            <form data-role="validator" action="<?= base_url('updaterapat') ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <input type="hidden" name="id" value="<?= $rapat->id ?>" />
                <input type="hidden" name="code" value="<?= $rapat->unique_code ?>" />
                <div class="row mb-4">
                    <label class="cell-sm-2">Pimpinan Rapat</label>
                    <div class="cell-sm-4">
                        <input data-role="tagsinput" data-validate="required" type="text" name="members_name" id="members_name" value="<?= $rapat->members_name ?>" placeholder="Tambah Pimpinan Rapat">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Narasumber</label>
                    <div class="cell-sm-4">
                        <input type="text" data-role="tagsinput min=2" data-tag-trigger="Space" name="speakers_name" id="speakers_name" value="<?= $rapat->speakers_name ?>" placeholder="Tambah Narasumber">
                        <span style="color: red;"><small>Jika Narasumber lebih dari 1 orang, maka tambahkan koma(,) diakhir nama dan tambahkan spasi</small></span>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Tipe Rapat</label>
                    <div class="cell-sm-4">
                        <select name="type_id" id="type_id" data-role="select" data-validate="required not=0">
                            <?php $i = 1; ?>
                            <option value="<?= $rapat->id; ?>"><?= $i++; ?>. <?= $rapat->meeting_type; ?>
                            <option value='0' disabled>-- Pilih Media Rapat --</option>
                            <?php foreach ($types as $p) : ?>
                                <option value="<?= $p['id']; ?>"><?= $i++; ?>. <?= $p['meeting_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Media Rapat</label>
                    <div class="cell-sm-4">
                        <select name="meeting_subtype" id="meeting_subtype" data-validate="required not=0">
                            <?php $i = 1; ?>
                            <option value="<?= $rapat->id; ?>"><?= $i++; ?>. <?= $rapat->meeting_subtype; ?>
                            <option value='0' disabled>-- Pilih Media Rapat --</option>
                            <!-- SubMedia Rapat akan diload menggunakan ajax, dan ditampilkan disini -->
                        </select>
                    </div>
                </div>
                <div class="row mb-4" id="zoom_id" style='display:none;'>
                    <label class="cell-sm-2">ZOOM ID</label>
                    <div class="cell-sm-6">
                        <ul class="chec-radio">
                            <!-- Radio Button Here -->
                            <?php get_available_zoomid(); ?>
                        </ul>
                    </div>
                </div>
                <div class="row mb-4" id="other_online_id" style='display:none;'>
                    <label class="cell-sm-2">ID Rapat lain</label>
                    <div class="cell-sm-6">
                        <input type="text" id="onlineId" name="other_online_id" class="border" placeholder="ID Rapat" autocomplete="off" disabled>
                        <!-- <br /> -->
                        <input type="checkbox" class="dissable" id="yourBox" />
                        <small class="text-danger"> Aktifkan CkeckBox Jika tidak menggunakan ZOOM Meeting</small>
                    </div>
                </div>
                <!-- https://ilmucoding.com/middleware-filters-codeigniter-4/ -->
                <div class="row mb-4">
                    <label class="cell-sm-2">Agenda Rapat</label>
                    <div class="cell-sm-10">
                        <textarea name="agenda" data-validate="required" id="context-form" placeholder="Tuliskan Agenda Rapatnya disini..."><?= $rapat->agenda ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="cell">
                        <button type="submit" id="btnSave" class="button success"><span class="mif-file-text"></span> Ubah Rapat</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- End of Form -->

<!-- End of Content -->
<?php $this->endSection(); ?>