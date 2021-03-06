<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12" style="float:none;margin:auto;">
        <div class="row" style="margin-top: 104px;">
            <div class="row" style="display: flex;flex-wrap: wrap;margin-left: -52px;margin-right: -6px;margin-top: -15px;">
                <div class="cell order-2" style="margin-top: 77px;">
                    <button class="command-button primary outline rounded" onclick="zohoOpen()">
                        <span class="mif-wifi-connect icon"></span>
                        <span class="caption">
                            Yes, Connect
                            <small>get me into my account</small>
                        </span>
                    </button>
                </div>
                <div class="cell order-1">
                    <ul class="sidenav-m3">
                        <li class="title">ZOHO FORM BUILDER</li>
                        <li class="stick-right bg-blue"><a href="<?= base_url('zohoconnect'); ?>"><span class="mif-lock icon"></span> Login</a></li>
                        <li><a href="<?= base_url('zohoforms'); ?>"><span class="mif-file-text icon"></span>All Forms</a></li>
                        <li><a href="<?= base_url('zohoreports'); ?>"><span class="mif-file-pdf icon"></span>All Reports</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content here -->
</div>

<?php
$this->endSection();
