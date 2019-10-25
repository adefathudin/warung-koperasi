<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Cashout extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['title'] = 'Tarik Saldo Rekening';
        $this->data['subview'] = 'rekening/cashout';
        $this->load->view('_layout_main', $this->data);
    }

    public function proses($user_id = null){
        $this->load->library('session');
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');
        $user_id = $this->session->userdata('user_id');
        $nominal_cashout = $this->input->post('nominalCashout');
        $rek = $this->rekening_m->get($user_id);
        $update_saldo = array (
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir - $nominal_cashout),
            'saldo_beku' => ($rek->saldo_beku + $nominal_cashout), 
            'total_nominal_cash_out' => ($rek->total_nominal_cash_out + $nominal_cashout),
            'total_cash_out' => ($rek->total_cash_out + 1)
        );
        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '2', 'nominal' => $nominal_cashout,
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir - $nominal_cashout)
        );
        if (md5($this->input->post('password')) == $this->session->userdata('password')){
            $this->rekening_m->save($update_saldo, $user_id);
            $this->mutasi_rekening_m->save($insert_mutasi);
            $this->session->set_flashdata('pesan_cashout','Penarikan saldo rekening sebesar Rp<b>'.number_format($nominal_cashout).'</b> telah berhasil. Dana akan masuk ke rekening anda paling lambat 1x24 jam');
            //set up email
            $config = array(
                'SMTPSecure' => "ssl", 'SMTPAuth' => TRUE,
                'protocol' => 'smtp', 'smtp_host' => 'mail.warungkoperasi.my.id', 'smtp_port' => 465,
                'smtp_user' => 'no-reply@warungkoperasi.my.id', 'smtp_pass' => 'hancamacul', 
                'smtp_username' => 'no-reply@warungkoperasi.my.id', 'mailtype' => 'html', 'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $message =  "<html><head><title>Penarikan Saldo Rekening WarungKoperasi</title></head><body>
                    <p>Yang terhormat,<br><br>
                    Anda baru saja telah melakukan penarikan saldo rekening <a href='".base_url()."' target='_blank'><strong>WarungKoperasi</strong></a> sebesar <b>".$nominal_cashout."</b>. Jika anda tidak merasa melakukannya, silahkan hubungi kami melalui email <a href='mailto:support@warungkoperasi.my.id'>support@warungkoperasi.com</a>.<br>Terima kasih<br><br><br>Best Regards,<br>Warung Koperasi Team</p></body></html>";
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "myEmail@gmail.com"; // SMTP account username
    $mail->Password   = "myPassword";        // SMTP account password
    $mail->SetFrom('myEmail@gmail.com', 'James Cushing');
    $mail->AddReplyTo("myEmail@gmail.com","James Cushing");
    $mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
    $mail->MsgHTML($message)
    $address = "myOtherEmail@me.com";
    $mail->AddAddress($address, "James Cushing");

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user'], 'WarungKoperasi');
                    $this->email->to($email);
                    $this->email->subject('Penarikan Saldo Rekening WarungKoperasi');
                    $this->email->message($message);
                    //sending email
                    if($this->email->send()){
                    }else{
                        $this->session->set_flashdata('message', $this->email->print_debugger());
                    }
                } 
        redirect ('rekening/cashout');
    }

}
