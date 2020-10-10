<?php

// CHANGE STATUS HELPER
function form_change_status_online($rapat)
{
    if ($rapat->request_status == 0) : ?>
        <option value="<?= $rapat->request_status; ?>">Booked</option>
    <?php elseif ($rapat->request_status == 1) : ?>
        <option value="<?= $rapat->request_status; ?>">Pembatalan</option>
    <?php elseif ($rapat->request_status == 2) : ?>
        <option value="<?= $rapat->request_status; ?>">Perubahan Jadwal</option>
    <?php endif; ?>

    <option value="" disabled>---------</option>
    <option value="0">Booked</option>
    <option value="1">Pembatalan</option>
    <option value="2">Perubahan Jadwal</option>
    <?php
}

function form_change_status_offline($rapat)
{
    if ($rapat->request_status == 0) : ?>
        <option value="<?= $rapat->request_status; ?>">Booked</option>
    <?php elseif ($rapat->request_status == 1) : ?>
        <option value="<?= $rapat->request_status; ?>">Pembatalan</option>
    <?php elseif ($rapat->request_status == 2) : ?>
        <option value="<?= $rapat->request_status; ?>">Perubahan Jadwal</option>
    <?php endif; ?>

    <option value="" disabled>---------</option>
    <option value="0">Booked</option>
    <option value="1">Pembatalan</option>
    <option value="2">Perubahan Jadwal</option>
<?php
}

function form_expired_status($rapat)
{
    echo "expired";
}

function form_cancel_status($rapat)
{
    echo "cancel";
}

// REQUEST STATUS HELPER
function change_status_button($rapat)
{
    if ($rapat['request_status'] == 0) :
        $status = 'alert';
        $request_status = 'Booked';
        $icon = 'mif-pin';
    elseif ($rapat['request_status'] == 1) :
        $status = 'dark';
        $request_status = 'Pembatalan';
        $icon = 'mif-not';
    else :
        $status = 'primary';
        $request_status = 'Perubahan Jadwal';
        $icon = 'mif-sync-problem';
    endif;
?>
    <button class="button dropdown-toggle <?= $status; ?>"><span class="<?= $icon; ?>"></span> <?= $request_status; ?></button>
<?php
}
