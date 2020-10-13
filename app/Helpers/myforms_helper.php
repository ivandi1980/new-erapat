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

    <?php
    $ci = \Config\Database::connect();
    $builder = $ci->table('meeting_status')->get();
    $query = $builder->getResultArray();

    foreach ($query as $r) : ?>
        <option value="<?= $r['id']; ?>"><?= $r['status_name']; ?></option>
    <?php endforeach;
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

    <option value=""> -- Pilih Status --</option>
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
    $currenttime = date("H:i:s");
    $starttime = date($rapat['start_time']);
    $endtime = date($rapat['end_time']);
    $endtime = $endtime <= $starttime ? $endtime + 2400 : $endtime;

    if (($currenttime >= $starttime) && ($currenttime <= $endtime)) :
        if ($rapat['request_status'] == 0) : ?>
            <button class="button dropdown-toggle alert">Booked</button>
        <?php
        elseif ($rapat['request_status'] == 1) : ?>
            <button class="button dropdown-toggle dark">Pembatalan</button>
        <?php
        else : ?>
            <button class="button dropdown-toggle primary">Perubahan Jadwal</button>
        <?php
        endif;
    else :
        $status1 = 'secondary';
        $request_status1 = 'Telah Berakhir'; ?>
        <button class="button <?= $status1; ?>" disabled><span class="mif-done_all"></span> <?= $request_status1; ?></button>
    <?php
    endif;
    ?>

<?php
}
