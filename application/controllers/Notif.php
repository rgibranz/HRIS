<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notif extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti', 'cuti');
    }

    public function direktur_notif()
    {
        $notif = $this->cuti->countnotif_dikretur();
        echo json_encode($notif);
    }

    public function direkturv_notif()
    {
        $notif = $this->cuti->notif_dikretur();
        echo json_encode($notif);
    }

    public function manajer_notif()
    {
        $notif = $this->cuti->countnotif_manajer();
        echo json_encode($notif);
    }

    public function manajerv_notif()
    {
        $notif = $this->cuti->notif_manajer();
        echo json_encode($notif);
    }

    public function karyawan_notif()
    {
        $notif = $this->cuti->notif_dikretur();
        echo json_encode($notif);
    }
}

/* End of file Notif.php */
