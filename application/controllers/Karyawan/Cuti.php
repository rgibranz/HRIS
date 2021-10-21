<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

    public function index()
    {
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
            $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $id_karyawan = $s_id['id_karyawan'];
            $data = array(
                'title' => 'Form Cuti',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'user/form_cuti'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
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
}

/* End of file Cuti.php */
