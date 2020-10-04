<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>


<!-- start content here -->
<?= userTabMenu($tabs); ?>

<!-- Start Main Content -->
<div class="container">
    <div class="red-div-alert-2">
        <?php if (session()->get('id') == true) : ?>
            <?= red_div_alert_2(); ?>
        <?php else : ?>
            <?= ''; ?>
        <?php endif; ?>
    </div>
    <div class="toolbar my-5" style="margin-left: 2px;">
        <strong> Tabel Detail Rapat</strong>&nbsp; - &nbsp;<i><?= $rapat->sub_department_name ?></i>
    </div>
    <div class="toolbar my-3 place-right">
        Data Rapat Tanggal : &nbsp;<strong><?= date("d-m-Y", strtotime($rapat->end_date)); ?></strong>
    </div>
    <div class="row detail-tab">
        <div class="col-md-2">
            <ul data-tabs-position="vertical h-100" data-role="tabs" data-expand="sm">
                <li><a href="#_target_1"><span class="mif-profile"></span> Base Profile</a></li>
                <li><a href="#_target_2"><span class="mif-windows"></span> Media Rapat</a></li>
                <li><a href="#_target_3"><span class="mif-stackoverflow"></span> Data Rapat</a></li>
                <li><a href="#_target_4"><span class="mif-file-upload"></span> File Pendukung</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="border bd-default p-2 detail-tab-content">
                <div id="_target_1">
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Sekretariat</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= $rapat->department_name ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Bagian</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= $rapat->sub_department_name ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Pimpinan Rapat</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= $rapat->members_name ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Narasumber</label>
                        <div class="cell-sm-10">
                            <?php
                            if (empty($rapat->speakers_name)) : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    <strong>Narasumber</strong> tidak ada.
                                </span>
                            <?php
                            else : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->speakers_name ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Diajukan Oleh</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= $rapat->name ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Tanggal Pengajuan</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= date("d-m-Y", strtotime($rapat->date_requested)); ?></strong>.
                            </span>
                        </div>
                    </div>
                </div>
                <div id="_target_2">
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Tipe Media</label>
                        <div class="cell-sm-10">
                            <?php
                            if ($rapat->type_id == 1) : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->meeting_type; ?></strong>
                                </span>
                            <?php
                            else : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    <strong><?= $rapat->meeting_type; ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Media yang dipakai</label>
                        <div class="cell-sm-10">
                            <?php
                            if ($rapat->type_id == 1) : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->meeting_subtype; ?></strong>
                                </span>
                            <?php
                            else : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    <strong><?= $rapat->meeting_subtype; ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="_target_3">
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Tanggal Rapat</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= date("d-m-Y", strtotime($rapat->end_date)); ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Jam Mulai</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= date("H:i", strtotime($rapat->start_time)); ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Jam Akhir</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= date("H:i", strtotime($rapat->end_time)); ?></strong>.
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Agenda</label>
                        <div class="cell-sm-10">
                            <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                <strong><?= $rapat->agenda ?></strong>.
                            </span>
                        </div>
                    </div>
                </div>
                <div id="_target_4">
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Undangan Rapat</label>
                        <div class="cell-sm-10">
                            <?php
                            if (empty($rapat->files_upload)) : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    File <strong>Undangan Rapat</strong> tidak ditemukan, Mohon segera dilengkapi.
                                </span>
                            <?php
                            else : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->files_upload; ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Notulen Rapat</label>
                        <div class="cell-sm-10">
                            <?php
                            if (empty($rapat->files_upload1)) : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    File <strong>Notulen Rapat</strong> tidak ditemukan, Mohon segera dilengkapi.
                                </span>
                            <?php
                            else : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->files_upload1; ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">Absensi Rapat</label>
                        <div class="cell-sm-10">
                            <?php
                            if (empty($rapat->files_upload2)) : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    File <strong>Absensi Rapat</strong> tidak ditemukan, Mohon segera dilengkapi.
                                </span>
                            <?php
                            else : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->files_upload2; ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2" style="padding: 10px;">File Pendukung Lainnya</label>
                        <div class="cell-sm-10">
                            <?php
                            if (empty($rapat->files_upload2)) : ?>
                                <span class="remark alert" style="margin: 0;padding: 5px;color: brown;">
                                    File <strong>Pendukung Lainnya</strong> tidak ditemukan, Mohon segera dilengkapi.
                                </span>
                            <?php
                            else : ?>
                                <span class="remark success" style="margin: 0;padding: 5px;color: darkgreen;">
                                    <strong><?= $rapat->files_upload2; ?></strong>.
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php $this->endSection(); ?>