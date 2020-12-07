<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->isAdmin();
    $this->load->model('dashboard_model', 'dashboard');
    $this->load->helper('string');
  }

  public function index($id)
  {
    $userData = $this->session->userdata();
    $userId = $this->dashboard->findUser(["userId" => $id]);
    $params = [
      "userId" => $userId
    ];
    if ($userId->num_rows() !== 1) {
      return direct("0/alumni", "<div style='color:red'>Data tidak ditemukan</div>");
    }
    $data['content']  = 'dashboard/kirim_email';
    $data['active']   = 'email';
    $data['title']    = 'ALUMNI SD 1 - Admin';
    $data['subheading'] = 'ALUMNI SD 1';
    $data['head']       = 'Email';
    $data['breadcrumb'] = '<a href="' . site_url("0/alumni") . '">Alumni</a> <li class="breadcrumb-item active"> Kirim Email</li>';
    $data['userId'] = $userId->row();
    $data['userData']    = $userData;
    $data['alumni']     = $this->dashboard->get();
    $this->load->view("layouts/wrapper", $data);
  }

  public function send()
  {
    $id = $this->uri->segment(3);
    $this->load->library('mailer');

    $email_penerima = $this->input->post('emailP');
    // $email_penerima = 'bonaventura.pradhana@students.amikom.ac.id';
    $subjek = $this->input->post('subject');
    // $pesan = $this->input->post('Ini email testing');
    $pesan = $this->input->post('pesan');
    $attachment = $_FILES['attachment'];
    // $content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
    $content = $pesan;
    $sendmail = array(
      'email_penerima' => $email_penerima,
      'subjek' => $subjek,
      'content' => $content,
      'attachment' => $attachment
    );

    if (empty($attachment['name'])) { // Jika tanpa attachment
      $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
    } else { // Jika dengan attachment
      $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
    }

    if ($send['status'] === 'Gagal') {
      return direct("0/alumni", '<div style="color:red"' . $send['status'] . '<br/>' . $send['message'] . '</div>');
    }

    return direct("0/alumni", '<div style="color:green"' . $send['status'] . '<br/>' . $send['message'] . '</div>');

    // echo "<b>".$send['status']."</b><br />";
    // echo $send['message'];
    // echo "<br /><a href='".site_url("0/alumni")."'>Kembali</a>";
  }

  private function isAdmin()
  {
    if ($this->session->isLoggin && $this->session->roleName == 'Admin') {
      return true;
    }

    redirect('sign-out', 'refresh');
  }
}
