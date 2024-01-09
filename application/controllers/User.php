<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function list()
    {
        $data['title'] = 'List';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');

        $insert_data['datarps'] = $this->list->getList();
        $insert_data['db_add'] = $this->db->get('db_add')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/list', $insert_data);
        $this->load->view('templates/footer');
    }

    public function delete($id_data)
    {
        $this->load->model('List_model', 'list');

        // Memanggil metode deleteMateri dengan menyertakan $id_data sebagai argumen
        $this->list->deleteMatkul($id_data);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Deleted Successfully!</div>');
        redirect('user/list');
    }

    public function listMateri()
    {
        $data['title'] = 'List Materi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');

        $insert_data['datamateri'] = $this->list->getListMateri();
        $insert_data['db_materi'] = $this->db->get('db_materi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/listMateri', $insert_data);
        $this->load->view('templates/footer');
    }

    public function deleteMateri($id_materi)
    {
        $this->load->model('List_model', 'list');

        // Memanggil metode deleteMateri dengan menyertakan $id_materi sebagai argumen
        $this->list->deleteMateri($id_materi);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Deleted Successfully!</div>');
        redirect('user/listMateri');
    }

    public function create()
    {
        $data['title'] = 'Create';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');

        $insert_data['datarps'] = $this->list->getCreate();
        $insert_data['db_add'] = $this->db->get('db_add')->result_array();

        $this->form_validation->set_rules('program_studi', 'Program_studi', 'required');
        $this->form_validation->set_rules('kode_matkul', 'Kode_matkul', 'required');
        $this->form_validation->set_rules('nama_matkul', 'Nama_matkul', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('sks', 'Sks', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambaran_umum', 'Gambaran_umum');
        $this->form_validation->set_rules('capaian_pembelajaran', 'Capaian_pembelajaran');
        $this->form_validation->set_rules('prasyarat', 'Prasyarat');
        $this->form_validation->set_rules('kemampuan', 'Kemampuan');
        $this->form_validation->set_rules('indikator', 'Indikator');
        $this->form_validation->set_rules('bahan_kajian', 'Bahan_kajian');
        $this->form_validation->set_rules('metode_pembelajaran', 'Metode_pembelajaran');
        $this->form_validation->set_rules('waktu', 'Waktu');
        $this->form_validation->set_rules('metode_penilaian', 'Metode_penilaian');
        $this->form_validation->set_rules('bahan_ajar', 'Bahan_ajar');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas');
        $this->form_validation->set_rules('waktu_tugas', 'Waktu_tugas');
        $this->form_validation->set_rules('bobot', 'Bobot');
        $this->form_validation->set_rules('kriteria', 'Kriteria');
        $this->form_validation->set_rules('indikator_penilaian', 'Indikator_penilaian');
        $this->form_validation->set_rules('referensi', 'Referensi');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/create', $insert_data);
            $this->load->view('templates/footer');
        } else {
            $insert_data = [
                'program_studi' => $this->input->post('program_studi'),
                'kode_matkul' => $this->input->post('kode_matkul'),
                'nama_matkul' => $this->input->post('nama_matkul'),
                'semester' => $this->input->post('semester'),
                'sks' => $this->input->post('sks'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambaran_umum' => $this->input->post('gambaran_umum'),
                'capaian_pembelajaran' => $this->input->post('capaian_pembelajaran'),
                'prasyarat' => $this->input->post('prasyarat'),
                'kemampuan' => $this->input->post('kemampuan'),
                'indikator' => $this->input->post('indikator'),
                'bahan_kajian' => $this->input->post('bahan_kajian'),
                'metode_pembelajaran' => $this->input->post('metode_pembelajaran'),
                'waktu' => $this->input->post('waktu'),
                'metode_penilaian' => $this->input->post('metode_penilaian'),
                'bahan_ajar' => $this->input->post('bahan_ajar'),
                'aktivitas' => $this->input->post('aktivitas'),
                'waktu_tugas' => $this->input->post('waktu_tugas'),
                'bobot' => $this->input->post('bobot'),
                'kriteria' => $this->input->post('kriteria'),
                'indikator_penilaian' => $this->input->post('indikator_penilaian'),
                'referensi' => $this->input->post('referensi'),
            ];
            $this->db->insert('db_add', $insert_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mata Kuliah Added!</div>');
            redirect('user/list');
        }
    }

    public function createMateri()
    {
        $data['title'] = 'Create Materi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');

        $insert_data['datamateri'] = $this->list->getCreateMateri();
        $insert_data['db_materi'] = $this->db->get('db_materi')->result_array();

        $this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required');
        $this->form_validation->set_rules('kemampuan_akhir', 'Kemampuan_akhir', 'required');
        $this->form_validation->set_rules('indikator', 'Indikator', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/createMateri', $insert_data);
            $this->load->view('templates/footer');
        } else {
            $insert_data = [
                'pertemuan' => $this->input->post('pertemuan'),
                'kemampuan_akhir' => $this->input->post('kemampuan_akhir'),
                'indikator' => $this->input->post('indikator'),
                'topik' => $this->input->post('topik'),
                'aktivitas' => $this->input->post('aktivitas'),
                'waktu' => $this->input->post('waktu'),
                'penilaian' => $this->input->post('penilaian'),
            ];
            $this->db->insert('db_materi', $insert_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi Added!</div>');
            redirect('user/listMateri');
        }
    }

    public function editMatkul($id_data)
    {
        $data['title'] = 'Edit Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');

        $insert_data['datarps'] = $this->list->getEdit($id_data);

        $this->form_validation->set_rules('program_studi', 'Program_studi', 'required');
        $this->form_validation->set_rules('kode_matkul', 'Kode_matkul', 'required');
        $this->form_validation->set_rules('nama_matkul', 'Nama_matkul', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('sks', 'Sks', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambaran_umum', 'Gambaran_umum');
        $this->form_validation->set_rules('capaian_pembelajaran', 'Capaian_pembelajaran');
        $this->form_validation->set_rules('prasyarat', 'Prasyarat');
        $this->form_validation->set_rules('kemampuan', 'Kemampuan');
        $this->form_validation->set_rules('indikator', 'Indikator');
        $this->form_validation->set_rules('bahan_kajian', 'Bahan_kajian');
        $this->form_validation->set_rules('metode_pembelajaran', 'Metode_pembelajaran');
        $this->form_validation->set_rules('waktu', 'Waktu');
        $this->form_validation->set_rules('metode_penilaian', 'Metode_penilaian');
        $this->form_validation->set_rules('bahan_ajar', 'Bahan_ajar');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas');
        $this->form_validation->set_rules('waktu_tugas', 'Waktu_tugas');
        $this->form_validation->set_rules('bobot', 'Bobot');
        $this->form_validation->set_rules('kriteria', 'Kriteria');
        $this->form_validation->set_rules('indikator_penilaian', 'Indikator_penilaian');
        $this->form_validation->set_rules('referensi', 'Referensi');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editMatkul', $insert_data);
            $this->load->view('templates/footer');
        } else {
            $update_data = array(
                'program_studi' => $this->input->post('program_studi'),
                'kode_matkul' => $this->input->post('kode_matkul'),
                'nama_matkul' => $this->input->post('nama_matkul'),
                'semester' => $this->input->post('semester'),
                'sks' => $this->input->post('sks'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambaran_umum' => $this->input->post('gambaran_umum'),
                'capaian_pembelajaran' => $this->input->post('capaian_pembelajaran'),
                'prasyarat' => $this->input->post('prasyarat'),
                'kemampuan' => $this->input->post('kemampuan'),
                'indikator' => $this->input->post('indikator'),
                'bahan_kajian' => $this->input->post('bahan_kajian'),
                'metode_pembelajaran' => $this->input->post('metode_pembelajaran'),
                'waktu' => $this->input->post('waktu'),
                'metode_penilaian' => $this->input->post('metode_penilaian'),
                'bahan_ajar' => $this->input->post('bahan_ajar'),
                'aktivitas' => $this->input->post('aktivitas'),
                'waktu_tugas' => $this->input->post('waktu_tugas'),
                'bobot' => $this->input->post('bobot'),
                'kriteria' => $this->input->post('kriteria'),
                'indikator_penilaian' => $this->input->post('indikator_penilaian'),
                'referensi' => $this->input->post('referensi'),
            );

            $this->db->where('id_data', $id_data);
            $this->db->update('db_add', $update_data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated Successfully!</div>');
            redirect('user/list');
        }
    }

    public function editMateri($id_materi)
    {
        $data['title'] = 'Edit Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');

        $insert_data['datamateri'] = $this->list->getEditMateri($id_materi);

        $this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required');
        $this->form_validation->set_rules('kemampuan_akhir', 'Kemampuan_akhir', 'required');
        $this->form_validation->set_rules('indikator', 'Indikator', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editMateri', $insert_data);
            $this->load->view('templates/footer');
        } else {
            $update_materi = array(
                'pertemuan' => $this->input->post('pertemuan'),
                'kemampuan_akhir' => $this->input->post('kemampuan_akhir'),
                'indikator' => $this->input->post('indikator'),
                'topik' => $this->input->post('topik'),
                'aktivitas' => $this->input->post('aktivitas'),
                'waktu' => $this->input->post('waktu'),
                'penilaian' => $this->input->post('penilaian'),
            );

            $this->db->where('id_materi', $id_materi);
            $this->db->update('db_materi', $update_materi);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated Successfully!</div>');
            redirect('user/listMateri');
        }
    }

    public function viewRps($id_data)
    {
        $this->load->model('List_model', 'list');

        $insert_data['datarps'] = $this->list->getView($id_data);
        $insert_data['datamateri'] = $this->list->getListMateri();

        $this->load->view('user/viewRps', $insert_data);
    }
}
