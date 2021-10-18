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
        $this->form_validation->set_rules('jenis_cuti', 'jenis_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('mulai_tanggal', 'mulai_tanggal', 'required|trim', array('required' => 'Harus Di isi !!!'));
        // $this->form_validation->set_rules('sampai_tanggal', 'sampai_tanggal', 'required|trim', array('required' => 'Harus Di isi !!!'));
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
            $cek = $this->db->order_by('id_cuti', 'desc')->get_where('cuti', ['id_karyawan' => $this->session->userdata('id_karyawan')], 1)->row_array();
            $cek_menajer = $cek['status_manajer'];
            $cek_direktur = $cek['status_direktur'];

            if ($cek_menajer == "reject" || $cek_menajer == "") {
                if ($cek_direktur == "diajukan") {
                    $sisa_cuti = $this->input->post('sisa_cuti');
                    $lama_cuti = $this->input->post('lama_cuti');
                    $hasil = $sisa_cuti - $lama_cuti;
                    if ($sisa_cuti < $lama_cuti) {

                        $this->session->set_flashdata('invalidcuti', 'Cuti Berhasil di ajukan');
                        redirect('form/ajukan_cuti');
                    }
                    $sisa_cuti = $this->input->post('sisa_cuti');
                    $lama_cuti = $this->input->post('lama_cuti');
                    $hasil = $sisa_cuti - $lama_cuti;

                    $row_mb_tgl = $this->input->post("mulai_bekerja");
                    $mb_tgl = date_format(new DateTime($row_mb_tgl), "Y-m-d");

                    $row_m_tgl = $this->input->post("mulai_tanggal");
                    $m_tgl = date_format(new DateTime($row_m_tgl), "Y-m-d");
                    $s_tgl = date('Y-m-d', strtotime('+' . $lama_cuti . 'days', strtotime($m_tgl)));
                    // $row_s_tgl = $this->input->post("sampai_tanggal");
                    // $s_tgl = date_format(new DateTime($row_s_tgl), "Y-m-d");

                    $data = array(
                        'id_karyawan' => $this->input->post('id_karyawan'),
                        'nama_karyawan' => $this->input->post('nama_karyawan'),
                        'mulai_bekerja' => $mb_tgl,
                        'jenis_cuti' => $this->input->post('jenis_cuti'),
                        'lokasi_cuti' => $this->input->post('lokasi_cuti'),
                        'lama_cuti' => $lama_cuti,
                        'sisa_cuti' => $sisa_cuti,
                        'mulai_tanggal' => $m_tgl,
                        'sampai_tanggal' => $s_tgl,
                        'keterangan_cuti' => $this->input->post('keterangan_cuti'),
                        'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                        'status_manajer' => 'diajukan',
                        'status_direktur' => 'diajukan'
                    );
                    $sisa_data = array(
                        'id_karyawan' => $this->input->post('id_karyawan'),
                        'sisa_cuti' => $hasil,
                    );

                    $this->cuti->add($data);
                    $this->form->edit($sisa_data);
                    $this->session->set_flashdata('pesan', 'Cuti Berhasil di ajukan');
                    redirect('form/list_cuti');
                }
            }
            if ($cek_direktur != 'diajukan') {
                $sisa_cuti = $this->input->post('sisa_cuti');
                $lama_cuti = $this->input->post('lama_cuti');
                $hasil = $sisa_cuti - $lama_cuti;
                if ($sisa_cuti < $lama_cuti) {

                    $this->session->set_flashdata('invalidcuti', 'Cuti Berhasil di ajukan');
                    redirect('form/ajukan_cuti');
                }
                $sisa_cuti = $this->input->post('sisa_cuti');
                $lama_cuti = $this->input->post('lama_cuti');
                $hasil = $sisa_cuti - $lama_cuti;

                $row_mb_tgl = $this->input->post("mulai_bekerja");
                $mb_tgl = date_format(new DateTime($row_mb_tgl), "Y-m-d");

                $row_m_tgl = $this->input->post("mulai_tanggal");
                $m_tgl = date_format(new DateTime($row_m_tgl), "Y-m-d");
                $s_tgl = date('Y-m-d', strtotime('+' . $lama_cuti . 'days', strtotime($m_tgl)));
                // $row_s_tgl = $this->input->post("sampai_tanggal");
                // $s_tgl = date_format(new DateTime($row_s_tgl), "Y-m-d");

                $data = array(
                    'id_karyawan' => $this->input->post('id_karyawan'),
                    'nama_karyawan' => $this->input->post('nama_karyawan'),
                    'mulai_bekerja' => $mb_tgl,
                    'jenis_cuti' => $this->input->post('jenis_cuti'),
                    'lokasi_cuti' => $this->input->post('lokasi_cuti'),
                    'lama_cuti' => $lama_cuti,
                    'sisa_cuti' => $sisa_cuti,
                    'mulai_tanggal' => $m_tgl,
                    'sampai_tanggal' => $s_tgl,
                    'keterangan_cuti' => $this->input->post('keterangan_cuti'),
                    'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                    'status_manajer' => 'diajukan',
                    'status_direktur' => 'diajukan'
                );
                $sisa_data = array(
                    'id_karyawan' => $this->input->post('id_karyawan'),
                    'sisa_cuti' => $hasil,
                );

                $this->cuti->add($data);
                $this->form->edit($sisa_data);
                $this->session->set_flashdata('pesan', 'Cuti Berhasil di ajukan');
                redirect('form/list_cuti');
            }
            $this->session->set_flashdata('masihjalan', 'Cuti Berhasil di ajukan');
            redirect('form/ajukan_cuti');
        }
    }

    public function list_cuti()
    {
        $level = $this->session->userdata('level_user');
        if ($level == "manajer") {
            $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $id_karyawan = $s_id['id_karyawan'];
            $data = array(
                'title' => 'list Cuti',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'list_cuti' => $this->karyawan->get_all_data_cuti(),
                'isi' => 'manajer/list_cuti'
            );
            $this->load->view('layout/wrapper_manajer', $data, FALSE);
        }
        if ($level == "direktur") {
            $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $id_karyawan = $s_id['id_karyawan'];
            $data = array(
                'title' => 'list Cuti',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'list_cuti' => $this->karyawan->get_all_data_cuti(),
                'isi' => 'direktur/list_cuti'
            );
            $this->load->view('layout/wrapper_direktur', $data, FALSE);
        }
        if ($level == "admin") {
            $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $id_karyawan = $s_id['id_karyawan'];
            $data = array(
                'title' => 'list Cuti',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'list_cuti' => $this->karyawan->get_all_data_cuti(),
                'isi' => 'admin/list_cuti'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        }
        if ($level == "user") {
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
    }

    public function view_cuti($id_cuti)
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];

        $level = $this->session->userdata('level_user');
        if ($level == 'admin') {
            $data = array(
                'title' => ' Detail Karyawan',
                'list_cuti' => $this->cuti->view($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'admin/cuti',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        }
        if ($level == 'direktur') {
            $data = array(
                'title' => ' Detail Karyawan',
                'list_cuti' => $this->cuti->view($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'direktur/cuti',
            );
            $this->load->view('layout/wrapper_direktur', $data, FALSE);
        }
        if ($level == 'manajer') {
            $data = array(
                'title' => ' Detail Karyawan',
                'list_cuti' => $this->cuti->view($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'manajer/cuti',
            );
            $this->load->view('layout/wrapper_manajer', $data, FALSE);
        }
    }

    public function view_cuti_user($id_cuti = NULL)
    {
        $data = array(
            'title' => ' Detail Karyawan',
            'karyawan' => $this->karyawan->get_data($this->session->userdata('id_karyawan')),
            'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
            'isi' => 'user/cuti',
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }


    public function cuti_edit()
    {
        $status_manajer = $this->input->post('status_manajer');
        $status_direktur = $this->input->post('status_direktur');

        if ($status_direktur == "accept") {

            // $sisa_cuti = $this->input->post('sisa_cuti');
            // $lama_cuti = $this->input->post('lama_cuti');
            // $hasil = $sisa_cuti - $lama_cuti;

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_direktur' => $this->input->post('status_direktur'),
                'keterangan_direktur' => $this->input->post('keterangan_direktur'),
            );

            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
        if ($status_direktur == "reject") {
            // jika di reject maka sisa cuti kembali.
            $sisa_cuti = $this->input->post('sisa_cuti');


            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_direktur' => $this->input->post('status_direktur'),
                'keterangan_direktur' => $this->input->post('keterangan_direktur'),
            );

            $sisa_data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'sisa_cuti' => $sisa_cuti,
            );

            $this->cuti->edit_cuti($data);
            $this->form->edit($sisa_data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
        if ($status_manajer == "accept") {

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_manajer' => $this->input->post('status_manajer'),
                'keterangan_manajer' => $this->input->post('keterangan_manajer'),
            );
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
        if ($status_manajer == "reject") {
            // jika di reject maka sisa cuti kembali.
            $sisa_cuti = $this->input->post('sisa_cuti');

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_manajer' => $this->input->post('status_manajer'),
                'keterangan_manajer' => $this->input->post('keterangan_manajer'),
            );

            $sisa_data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'sisa_cuti' => $sisa_cuti,
            );

            $this->form->edit($sisa_data);
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
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
