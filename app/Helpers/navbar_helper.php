<?php

function navbar_($nav)
{ ?>
    <div data-role="appbar" data-expand-point="md">
        <a href="<?= base_url(); ?>" class="brand no-hover">
            <span style="width: 100px;">
                <img src="<?= get_perhub_svg(); ?>" alt="Logo" class="image_svg_thumb"><strong> E-RAPAT</strong>
            </span>
        </a>
        <ul class="app-bar-menu">
            <?php
            $nav_title = $nav;

            switch ($nav_title) {
                case "calendar": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper active text-bolds"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "dokumentasi": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper active text-bolds"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "login": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "register": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "zohoconnect": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "cek": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "admin": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "user": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "rapat": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "detail": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "pembaharuan": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "cekzoom": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "cekoffline": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php break;
                case "riwayat": ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class="text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php break;
                default:
                    echo "Menu tidak Aktif!";
            }
            ?>
        </ul>
        <div class="app-bar-container ml-auto d-none d-flex-md">
            <?php if ($nav_title == 'zohoconnect') : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub; color: yellow; font-weight: bold;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb_2" style="width: 20px;vertical-align: sub;"> Connecting....</a>
            <?php else : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb" style="width: 20px;vertical-align: sub;"> ZOHO Connect</a>
            <?php endif; ?>
        </div>
    </div>
<?php
}

function get_perhub_svg()
{ ?>
    <?= base_url('assets/locals/img/transport.svg'); ?>
<?php
}

function get_zoho_svg()
{ ?>
    <?= base_url('assets/locals/img/zoho.svg'); ?>
<?php
}
