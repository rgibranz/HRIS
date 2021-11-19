<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_cuti', 'cuti');

        checkauth($this->session->userdata('level_user'), 'direktur');
    }

    public function list_cuti()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => 'list Cuti',
            'users' => $this->users->get_data($id_users),
            // 'list_cuti' => $this->viewm->get_all_data_cuti(),
            'list_cuti' => $this->cuti->get_data_cuti($id_users),
            'isi' => 'users/list_cuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function view_cuti($id_cuti = null)
    {
        $data = array(
            'title' => ' Detail Karyawan',
            'users' => $this->users->get_data($this->session->userdata('id_users')),
            'list_cuti' => $this->cuti->view($id_cuti),
            'isi' => 'users/cuti',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    public function ajukan_cuti()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];

        $data = array(
            'title' => 'Ajukan Cuti',
            'users' => $this->users->get_data($id_users),
            'isi' => 'users/form_cuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('jenis_cuti', 'jenis_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('mulai_tanggal', 'mulai_tanggal', 'required|trim', array('required' => 'Harus Di isi !!!'));
        // $this->form_validation->set_rules('sampai_tanggal', 'sampai_tanggal', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('sisa_cuti', 'sisa_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));

        if ($this->form_validation->run() == false) {
            $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
            $id_users = $s_id['id_users'];
            $data = array(
                'title' => 'Form Cuti',
                'users' => $this->users->get_data($id_users),
                'isi' => 'users/form_cuti'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $cek = $this->db->order_by('id_cuti', 'desc')->get_where('cuti', ['id_users' => $this->session->userdata('id_users')], 1)->row_array();
            $cek_menajer = $cek['status_manajer'];
            $cek_direktur = $cek['status_direktur'];
            if ($cek_menajer == "reject" || $cek_menajer == "") {
                $sisa_cuti = $this->input->post('sisa_cuti');
                $lama_cuti = $this->input->post('lama_cuti');
                $kurang = $lama_cuti - 1;
                $hasil = $sisa_cuti - $lama_cuti;
                if ($sisa_cuti < $lama_cuti) {

                    $this->session->set_flashdata('invalidcuti', 'gagal mengajukan cuti');
                    redirect('karyawan/cuti/ajukan_cuti');
                }
                $row_mb_tgl = $this->input->post("mulai_bekerja");
                $mb_tgl = date_format(new DateTime($row_mb_tgl), "Y-m-d");

                $row_m_tgl = $this->input->post("mulai_tanggal");
                $m_tgl = date_format(new DateTime($row_m_tgl), "Y-m-d");
                $s_tgl = date('Y-m-d', strtotime('+' . $kurang . 'days', strtotime($m_tgl)));
                // $row_s_tgl = $this->input->post("sampai_tanggal");
                // $s_tgl = date_format(new DateTime($row_s_tgl), "Y-m-d");

                $data = array(
                    'id_users' => $this->input->post('id_users'),
                    'nama_users' => $this->input->post('nama_users'),
                    'id_divisi' => $this->input->post('id_divisi'),
                    'mulai_bekerja' => $mb_tgl,
                    'jenis_cuti' => $this->input->post('jenis_cuti'),
                    'lokasi_cuti' => $this->input->post('lokasi_cuti'),
                    'lama_cuti' => $lama_cuti,
                    'sisa_cuti' => $hasil,
                    'cuti_awal' => $sisa_cuti,
                    'mulai_tanggal' => $m_tgl,
                    'sampai_tanggal' => $s_tgl,
                    'keterangan_cuti' => $this->input->post('keterangan_cuti'),
                    'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                    'status_manajer' => 'diajukan',
                    'status_direktur' => '',

                );
                $sisa_data = array(
                    'id_users' => $this->input->post('id_users'),
                    'sisa_cuti' => $hasil,
                );

                $this->cuti->add($data);
                $this->users->edit($sisa_data);
                $this->session->set_flashdata('pesan', 'Cuti Berhasil di ajukan');
                redirect('karyawan/cuti/list_cuti');
            }
            if ($cek_direktur != '') {
                $sisa_cuti = $this->input->post('sisa_cuti');
                $lama_cuti = $this->input->post('lama_cuti');
                $kurang = $lama_cuti - 1;
                $hasil = $sisa_cuti - $lama_cuti;
                if ($sisa_cuti < $lama_cuti) {

                    $this->session->set_flashdata('invalidcuti', 'gagal mengjukan cuti');
                    redirect('karyawan/cuti/ajukan_cuti');
                }

                $row_mb_tgl = $this->input->post("mulai_bekerja");
                $mb_tgl = date_format(new DateTime($row_mb_tgl), "Y-m-d");

                $row_m_tgl = $this->input->post("mulai_tanggal");
                $m_tgl = date_format(new DateTime($row_m_tgl), "Y-m-d");
                $s_tgl = date('Y-m-d', strtotime('+' . $kurang . 'days', strtotime($m_tgl)));
                // $row_s_tgl = $this->input->post("sampai_tanggal");
                // $s_tgl = date_format(new DateTime($row_s_tgl), "Y-m-d");

                $data = array(
                    'id_users' => $this->input->post('id_users'),
                    'nama_users' => $this->input->post('nama_users'),
                    'id_divisi' => $this->input->post('id_divisi'),
                    'mulai_bekerja' => $mb_tgl,
                    'jenis_cuti' => $this->input->post('jenis_cuti'),
                    'lokasi_cuti' => $this->input->post('lokasi_cuti'),
                    'lama_cuti' => $lama_cuti,
                    'sisa_cuti' => $hasil,
                    'cuti_awal' => $sisa_cuti,
                    'mulai_tanggal' => $m_tgl,
                    'sampai_tanggal' => $s_tgl,
                    'keterangan_cuti' => $this->input->post('keterangan_cuti'),
                    'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                    'status_manajer' => 'diajukan',
                    'status_direktur' => '',

                );
                $sisa_data = array(
                    'id_users' => $this->input->post('id_users'),
                    'sisa_cuti' => $hasil,
                );

                $this->cuti->add($data);
                $this->cuti->edit($sisa_data);
                $this->session->set_flashdata('pesan', 'Cuti Berhasil di ajukan');
                redirect('karyawan/cuti/list_cuti');
            }

            $this->session->set_flashdata('masihjalan', 'Masih ada pengajuan Yang di proses');
            redirect('karyawan/cuti/ajukan_cuti');
        }
    }

    public function delete($id_cuti = null)
    {
        // mengambalikan sisa cuti //
        $s_id = $this->db->get_where('cuti', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $cuti = $s_id['sisa_cuti'];
        $lama_cuti = $s_id['lama_cuti'];
        $cuti_balik = $cuti + $lama_cuti;
        $balik = array(
            'id_users' => $s_id['id_users'],
            'sisa_cuti' => $cuti_balik,
        );

        //end mengambalikan sisa cuti //
        $data = array('id_cuti' => $id_cuti);
        $this->users->edit($balik);
        $this->cuti->delete($data);
        $this->session->set_flashdata('delete', 'Data Berhasil Di Hapus !!! ');
        redirect('karyawan/cuti/list_cuti');
    }

    public function kartu_cuti()
    {
        $data = array(
            'title' => 'Kartu Cuti',
            'users' => $this->users->get_data($this->session->userdata('id_users')),
            'isi' => 'users/select_datecuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    public function get_notif()
    {
        $notif = $this->cuti->notif();
        $result['notifx'] = "hai";

        echo json_encode($result);
    }
}

/* End of file Cuti.php */
