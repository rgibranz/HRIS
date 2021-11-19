<?php

function authcheck($level)
{
    switch ($level) {
        case 'Direktur':
            redirect('Direktur');
            break;
        case 'Karyawan':
            redirect('karyawan');
            break;
        case 'Manajer':
            redirect('manajer');
            break;
        case 'HR':
            redirect('hr');
            break;
        default:
            redirect('auth');
    }
}

function checkauth($level, $status)
{
    if ($level != $status) {
        authcheck($level);
    }
}
