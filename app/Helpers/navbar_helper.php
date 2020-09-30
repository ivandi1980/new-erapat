<?php

function navbar_before_login($nav_title)
{ ?>
    <div data-role="appbar" data-expand-point="md">
        <a href="<?= base_url(); ?>" class="brand no-hover">
            <span style="width: 100px;">
                <img src="<?= get_perhub_svg(); ?>" alt="Logo" class="image_svg_thumb"><strong> E-RAPAT</strong>
            </span>
        </a>
        <ul class="app-bar-menu">
            <?php if ($nav_title == 'calendar') : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper active text-bolds"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php elseif ($nav_title == 'login' || $nav_title == 'register' || $nav_title == 'zohoconnect') : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper text-bolds"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php else : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper active text-bolds"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php endif; ?>
        </ul>
        <div class="app-bar-container ml-auto d-none d-flex-md">
            <?php if ($nav_title == 'zohoconnect') : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub; color: yellow; font-weight: bold;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb_2" style="width: 20px;vertical-align: sub;"> Connecting....</a>
            <?php else : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb" style="width: 20px;vertical-align: sub;"> ZOHO Connect</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="d-flex flex-row align-items-center p-3 px-md-4 shadow-sm fixed-top app-flatbar">
        <h5 class="my-0 mr-md-auto font-weight-normal font-h5">BADAN PENELITIAN DAN PENGEMBANGAN KEMENTRIAN PERHUBUNGAN</h5>

        <div class="app-bar-container ml-auto d-none d-flex-md">
            <?php if ($nav_title == 'login') : ?>
                <a href="<?= base_url('auth/login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                <a href="<?= base_url('auth/register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
            <?php elseif ($nav_title == 'register') : ?>
                <a href="<?= base_url('auth/login') ?>" class="button button-outline-transparent text-upper " style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                <a href="<?= base_url('auth/register') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
            <?php else : ?>
                <a href="<?= base_url('auth/login') ?>" class="button button-outline-transparent text-upper" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                <a href="<?= base_url('auth/register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
            <?php endif; ?>
        </div>
    </div>
<?php
}

function navbar_after_login($nav_title)
{ ?>
    <div data-role="appbar" data-expand-point="md">
        <a href="<?= base_url(); ?>" class="brand no-hover">
            <span style="width: 100px;">
                <img src="<?= get_perhub_svg(); ?>" alt="Logo" class="image_svg_thumb"><strong> E-RAPAT</strong>
            </span>
        </a>
        <ul class="app-bar-menu">
            <?php if ($nav_title == 'calendar') : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper active text-bolds"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php elseif ($nav_title == 'login' || $nav_title == 'register' || $nav_title == 'zohoconnect') : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper text-bolds"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php else : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper active text-bolds"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php endif; ?>
            <li>
                <a href="#" class="dropdown-toggle text-upper"><span class="icon mif-cabinet"></span> Master Data</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#"> Data Akun</a></li>
                    <li class="divider bg-lightGray"></li>
                    <li><a href="#"> Data Sekretariat</a></li>
                    <li><a href="#"> Data Bagian</a></li>
                    <li><a href="#"> Skype</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle text-upper"><span class="icon mif-file-empty"></span> Management</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#"> Data Akun</a></li>
                    <li class="divider bg-lightGray"></li>
                    <li><a href="#"> Data Sekretariat</a></li>
                    <li><a href="#"> Data Bagian</a></li>
                    <li><a href="#"> Skype</a></li>
                </ul>
            </li>
        </ul>
        <div class="app-bar-container ml-auto d-none d-flex-md">
            <?php if ($nav_title == 'zohoconnect') : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub; color: yellow; font-weight: bold;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb_2" style="width: 20px;vertical-align: sub;"> Connecting....</a>
            <?php else : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb" style="width: 20px;vertical-align: sub;"> ZOHO Connect</a>
            <?php endif; ?>
        </div>


        <!-- <div class="app-bar-container ml-auto d-none d-flex-md">
            <a href="#" class="dropdown-toggle text-upper" style="margin-right: 30px;"><span class="icon mif-user-check"></span> Ivandi Djoh Gah</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="#"> Profil</a></li>
                <li class="divider bg-lightGray"></li>
                <li><a href="#"> Ganti Password</a></li>
                <li><a href="#"> Logout</a></li>
            </ul>
        </div> -->

        <div class="d-flex flex-row align-items-center p-3 px-md-4 shadow-sm fixed-top app-flatbar">
            <h5 class="my-0 mr-md-auto font-weight-normal font-h5">BADAN PENELITIAN DAN PENGEMBANGAN KEMENTRIAN PERHUBUNGAN</h5>

            <div class="app-bar-container ml-auto d-none d-flex-md">
                <strong class="text-bolds-public"> <?php session()->get('name'); ?> </strong>
                <a class="app-bar-item dropdown-toggle marker-light pl-1 pr-5" href="#" style="margin-right: 20px;">
                    <img class="rounded" data-role="gravatar" data-email="sergey@pimenov.com.ua" data-size="25">
                </a>
                <ul class="v-menu place-right" data-role="dropdown">
                    <li class="divider"></li>
                    <li><a href="#"> Profil</a></li>
                    <li class="divider bg-lightGray"></li>
                    <li><a href="#"> Ganti Password</a></li>
                    <li><a href="<?= base_url('auth/logout'); ?>"> Logout</a></li>
                </ul>
            </div>
        </div>

    </div>
<?php
}

function get_perhub_svg()
{
    return "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+DQo8IS0tIENyZWF0ZWQgd2l0aCBJbmtzY2FwZSAoaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvKSAtLT4NCg0KPHN2Zw0KICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIg0KICAgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyINCiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyINCiAgIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciDQogICB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciDQogICB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiDQogICB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSINCiAgIGlkPSJzdmcyIg0KICAgdmVyc2lvbj0iMS4xIg0KICAgaW5rc2NhcGU6dmVyc2lvbj0iMC40OC40IHI5OTM5Ig0KICAgd2lkdGg9IjI2OS4xMjkwNiINCiAgIGhlaWdodD0iMzEzLjA1MDYzIg0KICAgc29kaXBvZGk6ZG9jbmFtZT0iTG9nbyBLZW1lbmh1Yi5wbmciPg0KICA8bWV0YWRhdGENCiAgICAgaWQ9Im1ldGFkYXRhOCI+DQogICAgPHJkZjpSREY+DQogICAgICA8Y2M6V29yaw0KICAgICAgICAgcmRmOmFib3V0PSIiPg0KICAgICAgICA8ZGM6Zm9ybWF0PmltYWdlL3N2Zyt4bWw8L2RjOmZvcm1hdD4NCiAgICAgICAgPGRjOnR5cGUNCiAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4NCiAgICAgICAgPGRjOnRpdGxlPjwvZGM6dGl0bGU+DQogICAgICA8L2NjOldvcms+DQogICAgPC9yZGY6UkRGPg0KICA8L21ldGFkYXRhPg0KICA8ZGVmcw0KICAgICBpZD0iZGVmczYiIC8+DQogIDxzb2RpcG9kaTpuYW1lZHZpZXcNCiAgICAgcGFnZWNvbG9yPSIjZmZmZmZmIg0KICAgICBib3JkZXJjb2xvcj0iIzY2NjY2NiINCiAgICAgYm9yZGVyb3BhY2l0eT0iMSINCiAgICAgb2JqZWN0dG9sZXJhbmNlPSIxMCINCiAgICAgZ3JpZHRvbGVyYW5jZT0iMTAiDQogICAgIGd1aWRldG9sZXJhbmNlPSIxMCINCiAgICAgaW5rc2NhcGU6cGFnZW9wYWNpdHk9IjAiDQogICAgIGlua3NjYXBlOnBhZ2VzaGFkb3c9IjIiDQogICAgIGlua3NjYXBlOndpbmRvdy13aWR0aD0iMTAyNCINCiAgICAgaW5rc2NhcGU6d2luZG93LWhlaWdodD0iNzEyIg0KICAgICBpZD0ibmFtZWR2aWV3NCINCiAgICAgc2hvd2dyaWQ9ImZhbHNlIg0KICAgICBmaXQtbWFyZ2luLXRvcD0iMCINCiAgICAgZml0LW1hcmdpbi1sZWZ0PSIwIg0KICAgICBmaXQtbWFyZ2luLXJpZ2h0PSIwIg0KICAgICBmaXQtbWFyZ2luLWJvdHRvbT0iMCINCiAgICAgaW5rc2NhcGU6em9vbT0iMC43MTA4NDMzNyINCiAgICAgaW5rc2NhcGU6Y3g9IjM2NC40OTU4Ig0KICAgICBpbmtzY2FwZTpjeT0iMjA2LjI3NTU4Ig0KICAgICBpbmtzY2FwZTp3aW5kb3cteD0iLTQiDQogICAgIGlua3NjYXBlOndpbmRvdy15PSItNCINCiAgICAgaW5rc2NhcGU6d2luZG93LW1heGltaXplZD0iMSINCiAgICAgaW5rc2NhcGU6Y3VycmVudC1sYXllcj0iZzI5ODciIC8+DQogIDxnDQogICAgIGlkPSJnMjk4NyINCiAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTEzLjcxNjA2NCwtNS43NjczMTgxKSI+DQogICAgPHBhdGgNCiAgICAgICBzdHlsZT0iZmlsbDojZmZjNDEyO2ZpbGwtb3BhY2l0eToxIg0KICAgICAgIGQ9Im0gMTQ0Ljg1NjAyLDMxNy4yOTQwMiBjIC0wLjg0MzUsLTAuOTg2NzEgLTIuMzA2NTYsLTQuMzI5MDkgLTMuMjUxMjYsLTcuNDI3NTIgLTIuNDUzNTEsLTguMDQ3MTIgLTEwLjkzMjMxLC0yMS4zNTM5NiAtMTguMTQwMjYsLTI4LjQ2OTgxIEMgMTE3LjM0NTkzLDI3NS4zNTYzIDExMC4zMDU0MywyNzEuMzIxOTUgODkuNzU4ODU0LDI2Mi4wODI2OCA3My41NzE2NzQsMjU0LjgwMzcxIDUxLjU1ODExOCwyMzcuMTYxMjEgNDAuMzY5Mjc3LDIyMi41IDM0LjQwNDc0NSwyMTQuNjg0NDIgMjUuNTE4OTQzLDE5OS4wOTIyNSAyMi42MTMyNDcsMTkxLjM0Mjk5IDIxLjgyMDcwNiwxODkuMjI5MzQgMjAuMzk4ODU0LDE4NS40NzUgMTkuNDUzNTc1LDE4MyBjIC0xLjY2OTkxNiwtNC4zNzIzIC0yLjM5MzEzLC03LjA4MDc2IC00LjY3Mjg0OCwtMTcuNSAtMS40MDc2MzgsLTYuNDMzNDggLTEuNDI0MDEzLC00NC40NjA3OCAtMC4wMjE5NiwtNTEgMS41NzI2OTEsLTcuMzM1MDggNC44MDUyNDMsLTE4LjQ4ODY1NyA2LjUyMDk5NywtMjIuNSAwLjgyMzM3MiwtMS45MjUgMi41NTk3NTksLTUuOTYyNTc2IDMuODU4NjM5LC04Ljk3MjM5MiBDIDI5LjcxNzgyMyw3Mi40MTU5ODcgNDMuOTA4NDEyLDUyLjMwMjc3NCA1My4xNjA0NTMsNDMuMzEwMTk0IDY3Ljc5NDAxOCwyOS4wODcwMDkgOTMuNjkxNjg2LDE0LjUwNzQ3OSAxMTIsMTAuMTg1NDc1IGMgMi40NzUsLTAuNTg0MjY3NSA1LjYyNSwtMS4zNjM3MDc2IDcsLTEuNzMyMDg4NyA2LjkwNTQ3LC0xLjg1MDA2ODggMTUuNzc1MDgsLTIuNzAwODc3NiAyOCwtMi42ODU4NzMzIDE3Ljk0NDEzLDAuMDIyMDI0IDI4LjEyNzk0LDEuNTA2MDE0MiA0MS41LDYuMDQ3NCAyMi42NzgyLDcuNzAxOTE1IDM2LjE3NDU0LDE1Ljk1NDk0MyA1My4zNDA5MSwzMi42MTgwMzEgMTAuNzI2NzQsMTAuNDEyMjUgMTkuMDU2NzMsMjIuMTQwNzkgMjYuOTAyMzcsMzcuODc4MjMzIDUuNTQ0NTYsMTEuMTIxNzUxIDYuNjYwNDQsMTMuOTM1MDUxIDguNDA0NCwyMS4xODg4MjMgMy4wMTczMSwxMi41NTAxMyAzLjc1NDU5LDE3LjQyMDA0IDUuNDUyODksMzYuMDE3ODMgMC41MjYxMyw1Ljc2MTY1IDAuNDE4NjIsNi4xMzQ0OCAtMi41MjU1Miw4Ljc1NzcyIC0zLjY4NDM4LDMuMjgyNzkgLTMuNzQ0NzksMy43ODE0NSAtMC43NzEyOCw2LjM2Njg4IDIuMTA4OSwxLjgzMzY3IDIuMjQxLDIuNTA0NDkgMS41NjE2NSw3LjkzMDM0IC0xLjU3MjM3LDEyLjU1ODI5IC0yLjA1Njg1LDEzLjc4MjEzIC01Ljc1NTM0LDE0LjUzODU1IC0zLjkwMTIyLDAuNzk3ODkgLTQuNDc2MjUsMS41MzgzMSAtNi43MzIxNiw4LjY2ODUyIC0xLjYzNjIxLDUuMTcxNTUgLTEuNjI2NDUsNS4zMjY3MSAwLjQ3NTgsNy41NjQ0NiAyLjU5NDIxLDIuNzYxNCAyLjYyMDkzLDUuMTc0NzkgMC4xMDEzOCw5LjE1NTcgLTEuMDQ0MywxLjY1IC0yLjg3MTg2LDQuOCAtNC4wNjEyNSw3IC0yLjYwNDk2LDQuODE4MzggLTMuNzM5Nyw1LjY1Mjg3IC02LjAyNDIzLDQuNDMwMjIgLTMuMjQ0MTUsLTEuNzM2MjIgLTQuNzk5NzUsLTAuOTM5NCAtOC44MzgwOCw0LjUyNzA4IC00LjM3NzQ2LDUuOTI1NTUgLTQuODMwODEsNy42MzQ0NyAtMi41MzE1NCw5LjU0MjcgMi42MzQ0OCwyLjE4NjQyIDEuNjQ5LDQuNDEwMSAtNC43NzY5MSwxMC43Nzg4OSAtNi40NTMwNyw2LjM5NTcxIC04LjU2MjUxLDcuMzI0NDUgLTEwLjcyMzA5LDQuNzIxMTEgLTEuODI3MzYsLTIuMjAxODMgLTMuNzYwOCwtMS44NjE5OCAtOS4xNzU5NSwxLjYxMjkxIC02LjA3MDgsMy44OTU2MiAtNy4wNTI2Nyw1LjU0NDMxIC01LjMwOTQ0LDguOTE1MzMgMC43MzY2NCwxLjQyNDUyIDEuMDM0NzEsMy4wNTQ4NSAwLjY2MjM3LDMuNjIyOTcgLTAuMzcyMzQsMC41NjgxMyAtNC40MTU5MywyLjk5NDYxIC04Ljk4NTc3LDUuMzkyMiBsIC04LjMwODc4LDQuMzU5MjQgLTIuOTkxOSwtMy4yMDEzMiBDIDE5Ni4yNDQ5OCwyNjIuNDQwNiAxOTQuNTc3NTgsMjYxIDE5NC4xODUyLDI2MSBjIC0xLjA3NTc0LDAgLTExLjM1NjQzLDMuODM3OSAtMTEuOTk3MjMsNC40Nzg3IC0wLjMwNzE1LDAuMzA3MTQgLTAuODEyNTksMi40NTUyNCAtMS4xMjMyMSw0Ljc3MzU0IC0wLjUzMDU5LDMuOTYwMDkgLTAuODA2NzYsNC4yNjg2NCAtNC41NjQ3Niw1LjEwMDE5IC0yLjIsMC40ODY4IC02LjkxODYxLDAuOTQ0MTUgLTEwLjQ4NTgxLDEuMDE2MzMgLTYuNDA2MzIsMC4xMjk2MyAtNi40OTIxLDAuMDk1OCAtNywtMi43NjE4MiAtMC42NTMwOCwtMy42NzQ1MiAtMy4zMjg4LC01LjUyODU2IC01Ljc2NDE5LC0zLjk5NDA5IC0xLjU2Mjk2LDAuOTg0NzggLTEuODAzNDQsMy42NTYyMyAtMi4yNSwyNC45OTQ4OSAtMC40ODQ1OSwyMy4xNTU3OSAtMC41NjMzNSwyMy45MDEzMiAtMi41NTUxNywyNC4xODYyOCAtMS4xMzAzNSwwLjE2MTcxIC0yLjc0NTMxLC0wLjUxMzI5IC0zLjU4ODgxLC0xLjUgeiBtIC0wLjg5NTg5LC02Ny43NDU5OCBjIDMuMTIzMjcsLTMuNzYzMzIgLTAuMzczOTgsLTYuMTU4MjUgLTkuMzg5MTMsLTYuNDI5NzMgLTQuMDI4NTgsLTAuMTIxMzEgLTUuMDMzMzcsLTAuMzY1NzYgLTE3LjA3MSwtNC4xNTMyMyAtMjMuOTk4OTI3LC03LjU1MDkgLTQ0LjQ5OTA4MSwtMjYuMDE3NjUgLTU3LjM2NTE2NSwtNTEuNjc1MTIgLTMuOTc0MDM2LC03LjkyNSAtNy4wMDI5MTYsLTExLjEwNzU2IC05LjI0OTY3MSwtOS43MTg5OSAtMi4yNDc5NjYsMS4zODkzMiAyLjE1MzU1NCwxMi42MTQ3NSA5LjQ4NTM2NCwyNC4xOTEwMyA1Ljg2MjEyNSw5LjI1NTc4IDIyLjMwODEwMiwyNi40MjIyMyAzMC42Mjk0NzIsMzEuOTcxMyAxMC42NjI2Miw3LjExMDMzIDMxLjIzOTQ2LDE1LjI1MjkgMzguNjE4NjksMTUuMjgyMDEgMi4xMzQ3MiwwLjAwOCA0LjU1NjMxLDAuNDUxNTMgNS4zODEzMSwwLjk4NDY5IDIuMjYwODIsMS40NjEwNiA3LjU5NTgsMS4xOTE5NSA4Ljk2MDEzLC0wLjQ1MTk2IHogTSAxNzIuNSwxODAgYyAwLC0wLjgwOTk0IC0wLjc4NzUsLTEuNjI0MjcgLTEuNzUsLTEuODA5NjMgLTEuMjI3ODUsLTAuMjM2NDYgLTEuNzUsMC4zMDM0OCAtMS43NSwxLjgwOTYzIDAsMS41MDYxNSAwLjUyMjE1LDIuMDQ2MDkgMS43NSwxLjgwOTYzIDAuOTYyNSwtMC4xODUzNiAxLjc1LC0wLjk5OTY5IDEuNzUsLTEuODA5NjMgeiBtIC0xNC41OTk1MiwtMjUuMDE4MiBjIDIuNDIwMjcsLTEuNjM5OTkgNC43ODI3NywtMi45ODE4IDUuMjUsLTIuOTgxOCAwLjQ2NzI0LDAgMC44NDk1MiwtMC42NzUgMC44NDk1MiwtMS41IDAsLTEuODgyNjcgLTkuOTY0MDEsLTIuMTM1OTkgLTExLjgsLTAuMyAtMS45NjM1NywxLjk2MzU3IC0xLjQyMTYsNy44NDg1MSAwLjcxNjY3LDcuNzgxOCAwLjMyMDgzLC0wLjAxIDIuNTYzNTUsLTEuMzYwMDEgNC45ODM4MSwtMyB6Ig0KICAgICAgIGlkPSJwYXRoMjk5MSINCiAgICAgICBpbmtzY2FwZTpjb25uZWN0b3ItY3VydmF0dXJlPSIwIiAvPg0KICAgIDxwYXRoDQogICAgICAgc3R5bGU9ImZpbGw6IzMwMWQ2ZSINCiAgICAgICBkPSJNIDE0Mi4xNjAwOCwyOTYuNzYwMDggQyAxNDEuNTIyMDQsMjk2LjEyMjA0IDE0MSwyOTQuOTQwMjcgMTQxLDI5NC4xMzM5MyBjIDAsLTIuNzQ1MTggLTkuMDQ0MzQsLTE1Ljk4ODUxIC0xMy44NzYxOCwtMjAuMzE4NDIgLTUuNzkyNjksLTUuMTkwOTUgLTE2LjkwMTM5LC0xMS42NTMxMiAtMjcuODU0ODM5LC0xNi4yMDM3NiBDIDcxLjczOTU2NCwyNDYuMTc0NTggNDcuMTg4MDM3LDIyMy4yMDY0IDMzLjU3NTAyLDE5Ni4xNTQ0MyAzMC4zMTE4ODEsMTg5LjY2OTg4IDI0LDE3Mi4zNjkzNiAyNCwxNjkuOTA5ODIgYyAwLC0xLjY1MTA0IDMuNDEwMDgsLTAuODIxODQgOS44OTY4MjcsMi40MDY1NSA2LjIwMTU5LDMuMDg2NDYgNi40NzA1NTIsMy4zODIwMiA4LjgxMjM5OCw5LjY4MzYzIDYuNjk3MTg0LDE4LjAyMTI4IDE0LjM5NTE4OCwzMC4yODk3NSAyNy4xNjA2NDQsNDMuMjg2NDkgMTcuMTI4NzA0LDE3LjQzOTA1IDM3LjY1MTMwMSwyOC4yNzg1IDYwLjEzMDEzMSwzMS43NTkwNSA5LjM3MTM2LDEuNDUxMDMgMTIuNDUzOTUsMi4xNjkgMTMuNzUsMy4yMDI1NCAxLjQ1MTAyLDEuMTU3MTEgMS44Mzg1OCwzNi4yNzAxMiAwLjQxMDA4LDM3LjE1Mjk4IC0wLjQ2MTk1LDAuMjg1NTEgLTEuMzYxOTUsLTAuMDAzIC0yLC0wLjY0MDk4IHogTSAxNTIuMjUsMjQ3Ljg2NzQ2IGMgLTAuOTA1NDEsLTAuOTE4MDYgLTEuMjUsLTYuMTU4NjggLTEuMjUsLTE5LjAxMDMgMCwtMTUuODI0NjUgMC4yMTE4NywtMTguMTAxOTIgMS45NTk3LC0yMS4wNjQyOSAyLjA2NzM2LC0zLjUwMzkgMTAuMzgxNjksLTkuMTE5MzUgMTYuMTI2NjMsLTEwLjg5MTgxIDEzLjIzNTI0LC00LjA4MzQxIDIzLjQzNTgxLC00Ljk2MDg0IDI3LjkxMzY3LC0yLjQwMTA2IDMuOTMwNDIsMi4yNDY4MyA2LDEuODkwODIgNiwtMS4wMzIxMiAwLC01LjM5MjY0IC0yLjQ2NDA5LC04Ljg4MDk0IC04LjI4NzY2LC0xMS43MzI0NyBDIDE5MS42Mzk4LDE4MC4yMzA5NCAxODguMjI5NzEsMTc5IDE4Ny4xMzQzOCwxNzkgYyAtMi4zMTI2MSwwIC00LjcyOTk0LC0yLjE1MDM2IC01LjYzOTc0LC01LjAxNjg5IC0xLjE2OTAyLC0zLjY4MzI3IC02LjIxODc3LC01LjM1MTgyIC0xNy40OTQ2NCwtNS43ODA2NSAtNS43NzUsLTAuMjE5NjIgLTEwLjkyNDUzLC0wLjgwMjA2IC0xMS40NDM0MSwtMS4yOTQyOSAtMi41MDMxOSwtMi4zNzQ3IDE1LjI5MTg4LC0xMy42OTIwOSAyNS45NDM0MSwtMTYuNDk5NjEgMS42NSwtMC40MzQ5MSAxOS42NSwtMC44MTcyNSA0MCwtMC44NDk2NSBsIDM3LC0wLjA1ODkgLTAuMzI0Miw2IGMgLTAuMzQxNDUsNi4zMTk0NCAtMC41ODA2Myw3LjMzNTk5IC00LjY2NzA2LDE5LjgzNTQ0IC01LjIzOTA2LDE2LjAyNTA2IC0xMi43MDAyNCwyNy43OTg0IC0yNi4zMDU1OSw0MS41MDg4MSAtMTMuNTUxMzUsMTMuNjU1OTkgLTI2LjA3Mzk1LDIxLjUwOTkxIC00My42ODk1LDI3LjQwMTE3IC0xMS40OTkxLDMuODQ1NyAtMjYuMTg2NzUsNS43Mjc5NSAtMjguMjYzNjUsMy42MjIwNCB6IE0gMTM0LDI0Mi45NDAxNyBjIC0zMS40NTk0NywtNC4zODAyIC01OC4xMjAxMDcsLTI0LjI4MDUgLTczLjQ1NjE2NiwtNTQuODI5OSAtNC4wMDY4MzcsLTcuOTgxNiAtMy44MDM3MzMsLTkuMDY0MjggMS43MDYxNjYsLTkuMDk0OTYgMS41MTI1LC0wLjAwOCAyLjc1LC0wLjQ0OTQ4IDIuNzUsLTAuOTgwMTMgQyA2NSwxNzYuODMyMjYgNjEuNjc5OTEzLDE3NSA1OS41MDAyMDEsMTc1IGMgLTIuMzk2MDcyLDAgLTE2LjAyOTE4LC02LjQ4ODA5IC0yMS45MDk2NjYsLTEwLjQyNjk3IC02LjU0NTYxOSwtNC4zODQzOSAtMTUuMDI1MzQyLC0xMy4wNjA0OCAtMTQuMTQ5Njc1LC0xNC40NzczNCAxLjA3Mjg2NiwtMS43MzU5MyAxMTguOTU1MjEsLTEuNTI4MyAxMjAuMzk5NTksMC4yMTIwNiAwLjU5Njk0LDAuNzE5MjcgMS4yMTQ1NCw2LjAwNjc3IDEuMzcyNDQsMTEuNzUgTCAxNDUuNSwxNzIuNSAxNTkuNjAxMTksMTczIGMgMTUuMDcxMjMsMC41MzQ0IDE2LjI3MzQzLDAuOTIzMDggMTguOTY3MjQsNi4xMzIzMiAxLjAzODQyLDIuMDA4MDkgMi40NzUxNSwyLjk2NjAzIDUuMTg0MDYsMy40NTY0OCA1LjAwOTI2LDAuOTA2OTQgOS40NjcxMiwzLjI0OTQxIDguOTgyMTcsNC43MTk4NiAtMC4yNDQ2OCwwLjc0MTkyIC0zLjc1ODIsMS40MTAwNiAtOS4zMTM3OCwxLjc3MTE0IC0xNC4zMjExOCwwLjkzMDc5IC0yMy4yMjI4NSw0LjAzNjE4IC0zMC41NTMwMywxMC42NTg1NiBDIDE0NS43ODQyMSwyMDYuMTM4IDE0NSwyMDguNzgxNSAxNDUsMjI2LjI2MDE2IGMgMCwxNS42NDE1NCAtMC41MTEzNCwxNy45MTg5OCAtMy45NSwxNy41OTI4MiAtMC44NTI1LC0wLjA4MDkgLTQuMDI1LC0wLjQ5MTYyIC03LjA1LC0wLjkxMjgxIHogTSAxNzIuNSwxODAgYyAwLC0wLjgwOTk0IC0wLjc4NzUsLTEuNjI0MjcgLTEuNzUsLTEuODA5NjMgLTEuMjI3ODUsLTAuMjM2NDYgLTEuNzUsMC4zMDM0OCAtMS43NSwxLjgwOTYzIDAsMS41MDYxNSAwLjUyMjE1LDIuMDQ2MDkgMS43NSwxLjgwOTYzIDAuOTYyNSwtMC4xODUzNiAxLjc1LC0wLjk5OTY5IDEuNzUsLTEuODA5NjMgeiBNIDIyLjIsMTM5LjggYyAtMS40MzY4MjYsLTEuNDM2ODMgLTEuNjMyMjA1LC0xNS43MjA0NCAtMC4yNzY3MDQsLTIwLjIyOSAwLjUwNzgxMywtMS42ODkwNSAxLjQ0OTE2NCwtNS41NDYgMi4wOTE4OTEsLTguNTcxIDIuNDQ1NTI4LC0xMS41MDk4OTEgOS43MTgxMTEsLTI5LjMzOTQxOSAxNC41NTMwMjIsLTM1LjY3ODMxNCAzLjExNzgzMywtNC4wODc2ODkgNC44Nzk2OTgsLTQuMTMzOTcgMTIuNDIyNjEyLC0wLjMyNjMyIEMgNTcuODgzLDc4LjQ3NDUyOCA3MC4zMjAwNjYsODMuNTI3ODQyIDc3LjUsODUuNzY2MzMzIGMgNy45ODQ2MjksMi40ODkzNzEgNy45MzY5MDIsMi4zNjIyMzMgNS41NzAxMjksMTQuODM3OTU3IC0xLjQ1MDczNCw3LjY0NzEgLTIuMDY3NDksMTQuOTM1NyAtMi4wNjg1NzksMjQuNDQ1NzEgLTAuMDAxMSw5LjIwMzY4IC0wLjM4NjQ2NCwxMy45MzQ5MSAtMS4yMDE1NSwxNC43NSAtMS43MTEzMjUsMS43MTEzMyAtNTUuODg4Njc1LDEuNzExMzMgLTU3LjYsMCB6IG0gNjYsMCBjIC0xLjg3NjE2NiwtMS44NzYxNyAtMS42MTA0ODgsLTMyLjc5NzkxIDAuMzQ2NTk4LC00MC4zMzk5MDEgMi4yMzU0MDMsLTguNjE0NTM3IDIuOTUyNTk5LC05LjEwMjExMiAxMS4xNzc2ODYsLTcuNTk4OTc3IEMgMTE1Ljc0MDgxLDk0Ljc4ODE0MiAxMzIuMzYyMDIsOTcgMTM4LjM0MDg1LDk3IGMgMi4zNDI1MywwIDQuNzk5MTUsMC41NCA1LjQ1OTE1LDEuMiAwLjg1MDEyLDAuODUwMTI0IDEuMiw2LjgwNjM1IDEuMiwyMC40Mjg1NyAwLDE2LjE0NzE5IC0wLjI1MTgyLDE5LjQ4MDM5IC0xLjU3MTQzLDIwLjggQyAxNDIuMDc5ODgsMTQwLjc3NzI2IDEzOC4xMzkzOSwxNDEgMTE1LjYyODU3LDE0MSA5Ni41NjE5MDUsMTQxIDg5LjA3MjMzMSwxNDAuNjcyMzMgODguMiwxMzkuOCB6IG0gNjQuMDUsMC41NDU4MSBDIDE1MC40OTg4NSwxMzkuNjI3ODcgMTUwLjQ1MTc4LDk5Ljk0ODIyNSAxNTIuMiw5OC4yIGMgMC42NiwtMC42NiAzLjY3MDQxLC0xLjIgNi42ODk4LC0xLjIgMy4wMTk0LDAgNy45OTE5LC0wLjQ2NjkxMiAxMS4wNSwtMS4wMzc1ODMgMy4wNTgxMSwtMC41NzA2NzEgOS4zODUyLC0xLjcxNDkyMiAxNC4wNjAyLC0yLjU0Mjc3OSA0LjY3NSwtMC44Mjc4NTcgMTAuNzQ0MTgsLTEuOTI1NjkxIDEzLjQ4NzA3LC0yLjQzOTYzMSAzLjY4MzE3LC0wLjY5MDEyMSA1LjI3MDg1LC0wLjYxMzU3MiA2LjA3MjQ1LDAuMjkyNzc5IDIuNzg4NDYsMy4xNTI4MzggNS43MTM3NSwyNC42NDY0ODQgNS4yNzA3OSwzOC43MjcyMTQgTCAyMDguNSwxNDAuNSAxODEsMTQwLjY3OTE1IGMgLTE1LjEyNSwwLjA5ODUgLTI4LjA2MjUsLTAuMDUxNSAtMjguNzUsLTAuMzMzMzQgeiBtIDYyLjQzMTI3LDAuMDAyIEMgMjE0LjMwNjU3LDEzOS45NzMyNCAyMTQsMTMzLjMzOTQ1IDIxNCwxMjUuNjA2MTggYyAwLC0xMi44MDIxIC0xLjEyNTk1LC0yMi4yNjMwOSAtMy45NjU0NywtMzMuMzIwNTA0IC0xLjAzODUyLC00LjA0NDExMyAtMC43NTk1NywtNC4yNjQxNTkgMTAuNDY1NDcsLTguMjU1NTg1IDE0LjM0NDMxLC01LjEwMDU4NCAxNi4yMDE1MSwtNS44NTQ2MzMgMjMuNjE0ODYsLTkuNTg3OTM0IDQuMjc2NDMsLTIuMTUzNTc0IDcuNzU4MjEsLTMuMjk5ODMyIDguOTExNDcsLTIuOTMzOCAxLjg2MjY4LDAuNTkxMTkxIDExLjg4ODk2LDE5LjU0MTM2OCAxNC4xMDAxOCwyNi42NTAwNjcgMy45OTQ1NiwxMi44NDE3ODYgNi42MTg1NSwyNi45OTQ3NjYgNy4yMDEzMiwzOC44NDE1NzYgbCAwLjE3MjE3LDMuNSAtMjkuNTY4NzMsMC4yNjQ2IGMgLTE2LjI2MjgsMC4xNDU1MyAtMjkuODc1MywtMC4wNDIgLTMwLjI1LC0wLjQxNjY3IHogTSAxMjYuODQ2NjcsOTAuNTEzMzMzIEMgMTI2LjU3OSw5MC4yNDU2NjcgMTIzLjAxNjUsODkuNTgxMzc2IDExOC45Myw4OS4wMzcxMzEgMTAxLjg5NTAzLDg2Ljc2ODM5NSA5NS41MTAwMTEsODUuMzE5NDUyIDkzLjg3NzA5Niw4My4zNTE5MSA5Mi42NzIzMDcsODEuOTAwMjI4IDkyLjgyNjc1Miw4MS40MjI3NjEgOTkuMDY5OTgsNjcuMjk4MTE3IGMgMi43MDU3NiwtNi4xMjE1MDEgMTIuNDExMzEsLTIxLjUzMTMyNCAxNS45NDA2MywtMjUuMzA5NDc2IDIuODY0MDEsLTMuMDY1OTMzIDMuMzExOTUsLTMuMjEyMTU4IDcuNzY0MzcsLTIuNTM0NTk2IDIuNTk4NzYsMC4zOTU0NzUgNy45ODExMywxLjA2OTcwMSAxMS45NjA4MywxLjQ5ODI3OSAzLjk3OTcsMC40Mjg1NzkgNy45MTcyLDEuMzQ0NzM0IDguNzUsMi4wMzU5IEMgMTQ0Ljc1NDc3LDQ0LjA0MTM2NyAxNDUsNDcuODM2NjQ3IDE0NSw2Ni40MjI0NDUgMTQ1LDgyLjMzODMyMSAxNDQuNjYxMTksODguOTM4ODEyIDE0My44LDg5LjggYyAtMS4xNTU4LDEuMTU1Nzk3IC0xNS44OTA4NywxLjc3NTc5NCAtMTYuOTUzMzMsMC43MTMzMzMgeiBNIDE1Mi4yLDg5LjggYyAtMS43NDc3OSwtMS43NDc3OTEgLTEuNzAxMDksLTQ2LjE1ODIwOCAwLjA1LC00Ny41NDUyMTIgMS4yOTMyOCwtMS4wMjQzNzkgMTMuODU4ODUsLTIuNTc5MDE4IDIxLjc1LC0yLjY5MDk1NSBsIDQuNSwtMC4wNjM4MyA2LjcyODAyLDEwIGMgNy4yMDIzNSwxMC43MDUwMjMgMTYuMDY5MzUsMjkuNDIyNDIgMTUuNTczNDksMzIuODc0MTgxIC0wLjIxNjY1LDEuNTA4MTM4IC0xLjI4NjYyLDIuMjkxMzk0IC0zLjgwMTUxLDIuNzgyODM0IC0xLjkyNSwwLjM3NjE2OCAtNi42NSwxLjMzNjYyNCAtMTAuNSwyLjEzNDM0NiBDIDE2OC4zMTI0Nyw5MS4wNTk4MjUgMTU0LjQ3MjA5LDkyLjA3MjA4NSAxNTIuMiw4OS44IHogTSA3NS41LDc5LjExNDEyNSBDIDU3LjY1ODE3NSw3Mi44MzExNjUgNDYsNjcuMDg2Mjk4IDQ2LDY0LjU3NzIzOSA0Niw2My44NDEwOSA1MS40MzkwNDEsNTcuNzg0MTQ4IDU4LjA4Njc1OCw1MS4xMTczNjcgNzAuMjA0ODY0LDM4Ljk2NDUxMSA4My44OTQ0MzEsMjkgODguNDcyMzExLDI5IGMgMS4xMzA3NTgsMCA0LjUyNDU3LDAuOTM0MjMxIDcuNTQxODA2LDIuMDc2MDY4IDMuMDE3MjM2LDEuMTQxODM3IDcuMzk4MzgzLDIuNzU5MTM4IDkuNzM1ODgzLDMuNTk0MDAyIDIuMzM3NSwwLjgzNDg2NCA0LjI1LDEuOTY4Nzc5IDQuMjUsMi41MTk4MTEgMCwwLjU1MTAzMiAtMi40MTQ0NSw0LjY3MTIzMSAtNS4zNjU0NCw5LjE1NTk5OCAtNi4xMjI5ODcsOS4zMDU0MDggLTExLjkyMDQwOSwyMC40NTMyNDQgLTE0LjI0OTI0NiwyNy4zOTk4MTMgLTEuNjg1OTcsNS4wMjg5OTMgLTMuOTczODg0LDguMjc2OTM1IC01Ljc5MDMwMiw4LjIxOTk2MiBDIDgzLjk5Mjc1Niw4MS45NDY3NjQgNzkuOSw4MC42NjM1NzYgNzUuNSw3OS4xMTQxMjUgeiBNIDIwMy41MzY2Miw3MS43NSBjIC0zLjg0NDA0LC05LjY3OTk4NSAtOS40NDY4MSwtMTkuOTUwMTQyIC0xNS4yODgxLC0yOC4wMjM4MzQgLTIuNzI5NDYsLTMuNzcyNTk0IC0zLjIwOTkxLC01LjA2Nzc2NyAtMi4yOTA3NSwtNi4xNzUyODMgMS41MDc2LC0xLjgxNjU0MyAxNy41OTI0MSwtOC41NTM3NTQgMjAuMzkyMTksLTguNTQxMzgzIDQuNjE5MTgsMC4wMjA0MSAyNC4wOTI2NiwxNC4yODA4OTkgMzMuNjUwMDQsMjQuNjQyMDI1IDYuODk3MzksNy40Nzc0NDIgOC43MzkzMSwxMC43NTI3MzYgNy4xMzQ0NSwxMi42ODY0NjggLTEuMjQxMTEsMS40OTU0NDYgLTE4LjU4NDU5LDkuMDk0MTMzIC0yOC43MDEwMywxMi41NzQ3NiAtMTAuNDM4NjksMy41OTE1MDEgLTEwLjY3MDQxLDMuNDgwMDg1IC0xNC44OTY4LC03LjE2Mjc1MyB6IE0gMTM0LjUsMzUuNDE4NzA3IGMgLTEyLjE1NTUzLC0xLjc2ODk3OSAtMTYuNzk2NzgsLTIuNzk4NzAxIC0yOC41NDYxOSwtNi4zMzMzNDYgLTEuOTUwNDEsLTAuNTg2NzUyIC00LjM4NjAzLC0xLjY4MDkxOSAtNS40MTI0OCwtMi40MzE0ODQgLTQuMDMwOTc0LC0yLjk0NzUxOCAtMS4yMTg1NCwtNC40NDg4NzUgMTkuOTU4NjcsLTEwLjY1NDUwMiAxMS45NzQ0MywtMy41MDg5MDYgNDIuMTgyNDYsLTMuODU3ODIyIDUyLjUsLTAuNjA2Mzk4IDMuMDI1LDAuOTUzMjg1IDcuMDc1LDIuMTk4MTk4IDksMi43NjY0NzMgOS45NzExMywyLjk0MzU1OCAxNS4wNzM3MSw1LjIxNDk4NCAxNC43OTQ0LDYuNTg1NzYgLTAuMzQxOTcsMS42NzgzMDUgLTguODYzOTMsNS4yNzIzMDMgLTE2Ljc5NDQsNy4wODI3NjkgLTMuMDI1LDAuNjkwNTg0IC03LjA3NSwxLjY0OTc5OCAtOSwyLjEzMTU4NyAtNC4wNTU5MSwxLjAxNTExMyAtMjIuNTUwMjksMy4xMjg3NzggLTI1LjUsMi45MTQzMTQgLTEuMSwtMC4wNzk5OCAtNi4wNSwtMC43MzQ4MDUgLTExLC0xLjQ1NTE3MyB6Ig0KICAgICAgIGlkPSJwYXRoMjk4OSINCiAgICAgICBpbmtzY2FwZTpjb25uZWN0b3ItY3VydmF0dXJlPSIwIiAvPg0KICA8L2c+DQo8L3N2Zz4NCg==";
}


function get_zoho_svg()
{
    return "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMjI1LjAwMDAwMHB0IiBoZWlnaHQ9IjIyNS4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDIyNS4wMDAwMDAgMjI1LjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgo8bWV0YWRhdGE+CkNyZWF0ZWQgYnkgcG90cmFjZSAxLjE2LCB3cml0dGVuIGJ5IFBldGVyIFNlbGluZ2VyIDIwMDEtMjAxOQo8L21ldGFkYXRhPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCwyMjUuMDAwMDAwKSBzY2FsZSgwLjEwMDAwMCwtMC4xMDAwMDApIgpmaWxsPSIjMDAwMDAwIiBzdHJva2U9Im5vbmUiPgo8cGF0aCBkPSJNMCAxMTI1IGwwIC0xMTI1IDExMjUgMCAxMTI1IDAgMCAxMTI1IDAgMTEyNSAtMTEyNSAwIC0xMTI1IDAgMAotMTEyNXogbTE1NjUgODA0IGMyNCAtNiA1NSAtMjQgNzIgLTQxIDI4IC0yOSAyOCAtMzAgMjggLTE1NiAwIC0xMDggLTQgLTEzOAotMjQgLTE5NyAtNjMgLTE4NSAtMTM0IC0yODEgLTQwMSAtNTQ1IC0yMDcgLTIwNSAtMjg5IC0yOTkgLTMzMSAtMzgyIGwtMTkKLTM4IDMwOCAwIGMzODcgMCA0NTIgLTEzIDUwMSAtMTAwIDQ2IC04MiAxNyAtMTc0IC02NyAtMjEzIC00NiAtMjIgLTU1IC0yMgotNTAyIC0yMiBsLTQ1NSAwIC00NyAyMyBjLTc1IDM3IC05MyA3NiAtOTMgMTk3IDAgMTE1IDIxIDE5MCA4NiAzMTMgNzUgMTQyCjE4NSAyNjQgNDI5IDQ4MiAyMDcgMTg0IDI0OSAyMzQgMjY1IDMyMiBsNyAzNyAtMzE0IDMgYy0yOTUgMyAtMzE1IDQgLTM0OCAyNAotOTggNTcgLTEwOSAxOTEgLTIxIDI1MyA2MiA0NSAxMTMgNTAgNTA5IDUwIDIzOSAxIDM4OSAtMyA0MTcgLTEweiIvPgo8L2c+Cjwvc3ZnPgo=";
}
?>