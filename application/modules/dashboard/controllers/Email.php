<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

  public function index(){
    $this->load->view('email');
  }

  public function send(){
    $this->load->library('mailer');

    // $email_penerima = $this->input->post('dimaz.taraz@gmail.com');
    $email_penerima = 'bonaventura.pradhana@students.amikom.ac.id';
    // $subjek = $this->input->post('Tes dulu');
    $subjek = 'Tes Dulu';
    // $pesan = $this->input->post('Ini email testing');
    $pesan = 'Ini email testing';
    // $attachment = $_FILES['attachment'];
    // $content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
    $sendmail = array(
      'email_penerima'=>$email_penerima,
      'subjek'=>$subjek,
    //   'content'=>$content,
    'content'=>'konten',
    //   'attachment'=>$attachment
    'attachment'=>'null'
    );

    if(empty($attachment['name'])){ // Jika tanpa attachment
      $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
    }else{ // Jika dengan attachment
      $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
    }

    echo "<b>".$send['status']."</b><br />";
    echo $send['message'];
    // echo "<br /><a href='".base_url("index.php/email")."'>Kembali ke Form</a>";
  }
}