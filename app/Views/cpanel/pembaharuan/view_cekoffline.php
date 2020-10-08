<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<!-- start content here -->
<?= userTabMenu($tabs); ?>

<!-- Start Main Content -->
<div class="container">
    <div data-role="navview" class="navview navview-compact-md navview-expand-lg compacted js-compact">
        <div class="navview-pane">
            <button class="pull-button">
                <span class="default-icon-menu"></span>
            </button>
            <ul class="navview-menu">
                <li>
                    <a href="<?= base_url('pembaharuan'); ?>">
                        <span class="icon"><span class="mif-loop2"></span></span>
                        <span class="caption">Cek Pembaharuan Rapat</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('cekzoom'); ?>">
                        <span class="icon"><span class="mif-video-camera"></span></span>
                        <span class="caption">Cek Ketersediaan ZoomID</span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= base_url('cekoffline'); ?>">
                        <span class="icon"><span class="mif-organization"></span></span>
                        <span class="caption">Cek Rapat Offline</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="toolbar my-4" style="margin-left: 65px;">
            <strong> Tabel Data Rapat Offline Hari ini</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= date("d-m-Y"); ?></strong>
        </div>
        <div class="row mb-4">
            <?= form_open('feed/searchoffline'); ?>
            <div class="cell-lg-12" style="margin-left: 65px;">
                <select name="type_id" id="getSubTypeId" data-role="select" data-validate="required not=0">
                    <option value='0'>-- Pilih Media Rapat --</option>
                    <?php $i = 1; ?>
                    <?php foreach ($tipe as $p) : ?>
                        <option value="<?= $p['id']; ?>"><?= $i++; ?>. <?= $p['meeting_subtype']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?= form_close(); ?>
        </div>
        <div class="navview-content d-flex flex-align-center flex-justify-center h-500">
            <table class="table table-condensed hover display" id="rapat" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center w-20">Tanggal</th>
                        <th class="text-center w-20">Mulai</th>
                        <th class="text-center w-20">Akhir</th>
                        <th class="text-center w-20">Nama Bidang</th>
                        <th class="text-center w-20">Media</th>
                        <th class="text-center w-20">ID Media</th>
                        <th class="text-center w-20">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rapat as $r) : ?>
                        <tr>
                            <td><?= date("d-m-Y", strtotime($r['end_date'])); ?></td>
                            <td><?= date("H:i", strtotime($r['start_time'])); ?></td>
                            <td><?= date("H:i", strtotime($r['end_time'])); ?></td>
                            <td><?= $r['sub_department_name']; ?></td>
                            <td><?= $r['meeting_subtype']; ?></td>
                            <td>
                                <?php
                                if ($r['type_id'] == 1) {
                                    if ($r['sub_type_id'] == 1) {
                                        echo "<strong><span class='fg-emerald'>" . $r['zoomid'] . "</span></strong>";
                                    } else {
                                        echo "<strong><span class='fg-cobalt'>" . $r['other_online_id'] . "</span></strong>";
                                    }
                                } else {
                                    echo "<strong><span class='fg-crimson'>Offline</span></strong>";
                                }
                                ?>
                            </td>
                            <td>
                                <div class="dropdown-button">
                                    <a href="<?= base_url('detail/' . $r['unique_code']); ?>" class="button"><span class="mif-eye"></span> Detail</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php
foreach ($rapat as $r) :
// echo empty_upload_alert($r['files_upload']);
endforeach;
$this->endSection();
