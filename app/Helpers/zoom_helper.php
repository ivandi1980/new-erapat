<?php

// Function Get Radio Button check Availabel Zoom ID
function get_available_zoomid()
{
    $ci = \Config\Database::connect();
    $builder = $ci->table('view_zoom_users');
    $zoomid = $builder->getWhere(['user_id !=' => session()->get('id')])->getResultArray();
    $d = $builder->getWhere(['user_id =' => session()->get('id')])->getRowArray();

    $currenttime = strtotime(date("H:i:s"));
    $starttime = strtotime(date($d['start_time']));
    $endtime = strtotime(date($d['end_time']));

    if (($currenttime >= $starttime) && ($currenttime <= $endtime) && $d['user_id'] === session()->get('id') && $d['status'] == 1) { ?>
        <li class="pz">
            <label class="radio-inline">
                <input type="radio" id="pro-chx-residential" name="zoomid" class="pro-chx" value="<?= $d['id']; ?>" disabled>
                <div class="notavail fg-crimson">
                    <i class="fas fa-times"></i> <?= $d['idzoom']; ?>
                    - (Zoom ID Default)
                </div>
            </label>
        </li>
    <?php
    } else { ?>
        <li class="pz">
            <label class="radio-inline">
                <input type="radio" id="pro-chx-residential" name="zoomid" class="pro-chx" value="<?= $d['id']; ?>" checked>
                <div class="avail fg-cobalt">
                    <i class="fas fa-check"></i> <?= $d['idzoom']; ?>
                    - (Zoom ID Default)
                </div>
            </label>
        </li>
        <?php
    }
    foreach ($zoomid as $zm) :

        if ($zm['role_id'] == '1' || $zm['role_id'] == '4' || $zm['role_id'] == '5') {
        ?>
            <li class="pz">
                <label class="radio-inline">
                    <input type="radio" id="pro-chx-residential" name="zoomid" class="pro-chx" value="<?= $zm['id']; ?>" disabled>
                    <div class="notavail fg-crimson">
                        <i class="fas fa-times"></i> <?= $zm['idzoom']; ?>
                        - (<?= $zm['pemilik_zoom']; ?>)
                    </div>
                </label>
            </li>
        <?php
        } else if (($currenttime >= $starttime) && ($currenttime <= $endtime) && $zm['user_id'] == session()->get('id')) {
        ?>
            <li class="pz">
                <label class="radio-inline">
                    <input type="radio" id="pro-chx-residential" name="zoomid" class="pro-chx" value="<?= $zm['id']; ?>" disabled>
                    <div class="notavail fg-crimson">
                        <i class="fas fa-times"></i> <?= $zm['idzoom']; ?>
                        - (<?= $zm['pemilik_zoom']; ?>)
                    </div>
                </label>
            </li>
        <?php
        } else if ($zm['status'] == 1) {
        ?>
            <li class="pz">
                <label class="radio-inline">
                    <input type="radio" id="pro-chx-residential" name="zoomid" class="pro-chx" value="<?= $zm['id']; ?>" disabled>
                    <div class="notavail fg-crimson">
                        <i class="fas fa-times"></i> <?= $zm['idzoom']; ?>
                        - (<?= $zm['pemilik_zoom']; ?>)
                    </div>
                </label>
            </li>
        <?php
        } else {
        ?>
            <li class="pz">
                <label class="radio-inline">
                    <input type="radio" id="pro-chx-residential" name="zoomid" class="pro-chx" value="<?= $zm['id']; ?>">
                    <div class="clab fg-emerald">
                        <i class="fas fa-check"></i> <?= $zm['idzoom']; ?>
                        - (<?= $zm['pemilik_zoom']; ?>)
                    </div>
                </label>
            </li>
<?php
        }
    endforeach;
}
