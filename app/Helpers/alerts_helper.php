<?php

function red_alert()
{ ?>
    <div class="toast show-top alert" style="display: block; top: 60px; left: 50%; margin-left: -284px; opacity: 1;"><span class="text-leader">At the moment, advertising is almost the only source of financing for the project. Please disable ad blocker and support Metro 4!</span><br><br>By the way, this block is shown by the built-in Metro 4 function! </div>
    <?php
}

function empty_upload_alert($data)
{
    if ($data == '') { ?>
        <script>
            window.onload = function() {
                var lat = `
                    <p>Anda belum menunggah File-file kelengkapan Rapat seperti :
                        <ul>
                            <li>Undangan Rapat</li>
                            <li>Notulen Rapat</li>
                            <li>Absensi Rapat</li>
                        </ul>
                        Mohon untuk segera mengunggah File-file kelengkapannya.
                    </p>
                `;
                setTimeout(function() {
                    infoBoxEventsExample1(lat)
                }, 1000);
            };
        </script>
    <?php
    }
}

function red_div_alert()
{ ?>
    <p class="remark alert" id="redAlert" style="margin-bottom: -15px;">
        <a href="#" id="hideEl"><i class="fas fa-times closer"></i></a>
        <strong>Anda belum menunggah File-file kelengkapan Rapat, Mohon Segera dilengkapi!</strong> .
    </p>
<?php
}

function red_div_alert_2()
{ ?>
    <p class="remark alert" id="redAlert" style="margin-bottom: -25px;">
        <a href="#" id="hideEl"><i class="fas fa-times closer-2"></i></a>
        <strong>Anda belum menunggah File-file kelengkapan Rapat, Mohon Segera dilengkapi!</strong> .
    </p>
<?php
}
