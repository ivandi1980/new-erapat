<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12" style="float:none;margin:auto;">
        <br> <br> <br> <br>
        <h1>&nbsp;</h1>
        <hr>
        <div class="row">
            <blockquote>
                <p>Klik Tombol dibawah ini untuk membuka Zoho Form.</p>
                <br>
                <hr>
                <button class="button primary" onclick="zohoOpen()">Zoho Form</button>
            </blockquote>
        </div>
    </div>
</div>
<!-- end content here -->
</div>

<?php
$this->endSection();
