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
    <?php
    if (session()->has('message')) {
    ?>
        <div class="remark <?= session()->getFlashdata('alert-class') ?>" id="hideMe">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php
    }
    ?>
    <div data-role="navview" class="navview navview-compact-md navview-expand-lg">
        <div class="navview-pane mt-6">
            <button class="pull-button">
                <span class="default-icon-menu"></span>
            </button>
            <ul class="navview-menu">
                <li class="active">
                    <a href="<?= base_url('admin'); ?>">
                        <span class="icon"><span class="mif-user-secret"></span></span>
                        <span class="caption">Base Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('changeadminpassword/' . $user->token); ?>">
                        <span class="icon"><span class="mif-key"></span></span>
                        <span class="caption">Ganti Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="toolbar my-4" style="margin-left: 293px;">
            <strong> Base Profile</strong> &nbsp;-&nbsp; <i><?= $user->name ?></i>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= date("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex h-500">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <img src="<?= base_url('assets/data/profile/') . '/' . $user->image; ?>" class="avatar" style="width: 280px;">
                    </div>
                    <div class="cell">
                        <form data-role="validator" action="<?= base_url('updateadmin/' . $user->token) ?>" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <input type="hidden" name="token" value="<?= $user->token ?>" />
                            <input type="hidden" name="id" value="<?= $user->id ?>" />
                            <table class="table cell-border table-border cell-media-table" style="width: 630px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 160px;">Nama User</td>
                                        <td>
                                            <strong><?= $user->name ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-light">Email</td>
                                        <td class="bg-light">
                                            <input data-role="input" data-validate="required email" type="email" name="email" value="<?= $user->email ?>" placeholder="isikan Email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-light">Zoom ID</td>
                                        <td class="bg-light">
                                            <input data-role="input" data-validate="required" type="text" name="zoomid" value="<?= $user->zoomid ?>" placeholder="Zoom ID">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Bagian</td>
                                        <td><strong><?= $user->sub_department_name; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <button type="submit" id="btnSave" class="button success"><span class="mif-checkmark"></span> Ubah Account administrator</button>
                                            <a href="<?= base_url('admin') ?>" class="button secondary"><span class="mif-not"></span> Batal</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php
$this->endSection();
