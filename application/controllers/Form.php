<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        $this->load->model('m_cuti', 'cuti');
        $this->load->model('m_form', 'form');

        $this->load->library('form_validation');
    }

    public function dump($id_karyawan = null)
    {

        $data = array(
            'title' => 'dump',
            'dump' => $this->cuti->get_all_data()->num_rows(),
            'isi' => 'user/dump',
            'dump_1' => $this->cuti->get_data($id_karyawan)
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function ajukan_cuti()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];

        $data = array(
            'title' => 'Ajukan Cuti',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'isi' => 'user/form_cuti'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function cuti_add()
    {
        $this->form_validation->set_rules('mulai_bekerja', 'mulai_bekerja', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('jenis_cuti', 'jenis_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('sisa_cuti', 'sisa_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));


        if ($this->form_validation->run() == false) {
            $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $id_karyawan = $s_id['id_karyawan'];
            $data = array(
                'title' => 'Form Cuti',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'user/form_cuti'
            );
            $this->load->view('layout/wrapper_user', $data, FALSE);
        } else {

            $row_tgl = $this->input->post("tanggal");
            $tgl = date_format(new DateTime($row_tgl), "Y-m-d");

            $data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'lama_cuti' => $this->input->post('lama_cuti'),
                'sisa_cuti_k' => $this->input->post('sisa_cuti'),
                'tanggal' => $tgl,
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                'status' => 'diajukan'
            );

            $this->cuti->add($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('dasboard_user');
        }
    }

    public function list_cuti()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $data = array(
            'title' => 'Ajukan Cuti',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'list_cuti' => $this->karyawan->get_data_cuti($id_karyawan),
            'isi' => 'user/list_cuti'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function list_cuti_admin()
    {
        $level = $this->session->userdata('level_user');
        if ($level == "manajer") {
            $data = array(
                'title' => 'Ajukan Cuti',
                'list_cuti' => $this->karyawan->get_all_data_cuti(),
                'isi' => 'manajer/list_cuti'
            );
            $this->load->view('layout/wrapper_manajer', $data, FALSE);
        }
        if ($level == "direktur") {
            $data = array(
                'title' => 'Ajukan Cuti',
                'list_cuti' => $this->karyawan->get_all_data_cuti(),
                'isi' => 'direktur/list_cuti'
            );
            $this->load->view('layout/wrapper_direktur', $data, FALSE);
        }
        if ($level == "admin") {
            $data = array(
                'title' => 'Ajukan Cuti',
                'list_cuti' => $this->karyawan->get_all_data_cuti(),
                'isi' => 'admin/list_cuti'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

    public function view_cuti($id_cuti = NULL, $id_karyawan = NuLL)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 'admin') {
            $data = array(
                'title' => ' view Karyawan',
                'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'admin/cuti',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        }
        if ($level == 'direktur') {
            $data = array(
                'title' => ' view Karyawan',
                'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'direktur/cuti',
            );
            $this->load->view('layout/wrapper_direktur', $data, FALSE);
        }
        if ($level == 'manajer') {
            $data = array(
                'title' => ' view Karyawan',
                'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'manajer/cuti',
            );
            $this->load->view('layout/wrapper_manajer', $data, FALSE);
        }
    }

    public function view_cuti_user($id_cuti = NULL)
    {
        $data = array(
            'title' => ' view Karyawan',
            'karyawan' => $this->karyawan->get_data($this->session->userdata('id_karyawan')),
            'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
            'isi' => 'user/cuti',
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }


    public function cuti_edit()
    {
        $status = $this->input->post('status');
        $status_manajer = $this->input->post('status_manajer');
        $status_direktur = $this->input->post('status_direktur');


        if ($status == "accept") {
            $sisa_cuti = $this->input->post('sisa_cuti_k');
            $lama_cuti = $this->input->post('lama_cuti');
            $hasil = $sisa_cuti - $lama_cuti;


            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'lama_cuti' => $this->input->post('lama_cuti'),
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                'status' => $this->input->post('status'),

            );

            $sisa_data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'sisa_cuti' => $hasil
            );
            $this->cuti->edit_cuti($data);
            $this->form->edit($sisa_data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti_admin');
        }
        if ($status_direktur == "accept") {

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'lama_cuti' => $this->input->post('lama_cuti'),
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                'status_direktur' => $this->input->post('status_direktur')
            );

            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti_admin');
        }
        if ($status_manajer == "accept") {

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'lama_cuti' => $this->input->post('lama_cuti'),
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                'status_manajer' => $this->input->post('status_manajer'),
            );
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti_admin');
        }
    }

    public function delete($id_cuti = null)
    {
        $data = array('id_cuti' => $id_cuti);
        $this->cuti->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('form/list_cuti');
    }
}

/* End of file Form.php */
