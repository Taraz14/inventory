<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('galeri_model', 'galeri');
        $this->load->helper('string');
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/galeri',
            'active' => 'Galeri',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Galeri',
            'breadcrumb' => 'Galeri',
            'gambar' => $this->galeri->getImage(),
            'userData' => $userData
        ]);
    }

    private function isAdmin()
    {
        if ($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out', 'refresh');
    }

    public function create()
    {
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('galeri'));
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'File', 'required', [
                "required" => "* Gambar tidak boleh dikosongkan."
            ]);
        }

        if (!$valid->run()) {
            return $this->index();
        }

        $this->actionCreate();
    }

    public function actionCreate()
    {
        $userData = $this->session->userdata();
        $data = [
            'userId' => $userData['id'],
            'categoryId' => 1,
            'foto' => $this->upload(),
            'deskripsi' => $this->input->post('deskripsi'),
            'uploadAt' => time()
        ];

        if (!$this->galeri->upload($data)) {
            return direct("0/galeri", "Gagal menambahkan data.");
        }

        return direct("0/galeri", "Berhasil menambahkan data.");
    }

    public function upload()
    {
        $path = 'assets/img/galeri/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $name         = "profile_" . random_string('alnum', 8) . "_" . microtime(true) . "_" . date("Ymd") . ".jpg";
        $config['upload_path']   = FCPATH . $path;
        $config['allowed_types'] = "gif|jpg|png|jpeg";
        $config['file_name']     = $name;
        $config['overwrite']     = true;
        $config['max_size']      = 1024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            return direct("0/galeri", $this->upload->display_errors());
        } else {
            $url = $path . $this->upload->data("file_name");
            return $url;
        }
    }

    public function delete($id)
    {
        if (empty($id)) {
            return jsonOutput(["result" => "error", "message" => "Data tidak ditemukan"]);
        }

        $params = [
            "galeriId" => $id
        ];

        $galeri = $this->galeri->findImages($params);
        if (empty($galeri)) {
            return jsonOutput(["result" => "error", "message" => "Data tidak ditemukan"]);
        }

        $images = FCPATH . $galeri->foto;
        if (@getimagesize($images)) {
            unlink($images);
        }

        if (!$this->galeri->deleteImage($params)) {
            return jsonOutput(["result" => "error", "message" => "Gagal menghapus foto"]);
        }

        $this->session->set_flashdata('message', 'Berhasil menghapus foto');
        return jsonOutput(["result" => "success", "message" => "Berhasil menghapus foto"]);
    }
}

/* End of file Galeri.php */
