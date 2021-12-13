<?php

namespace App\Contact\Controller;

use App\Kontak\Model\Kontak;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class ContactController
{
    public $kontak;

    public function __construct()
    {
        $this->kontak = new Kontak();
    }

    public function index(Request $request)
    {
        $datas = $this->kontak->groupBy('nama_kontak')->get();
        $list_data = $this->kontak->get();
        foreach ($datas->items as $key => $data) {
            foreach ($list_data->items as $key1 => $data1) {
                if ($data['nama_kontak'] == $data1['nama_kontak']) {
                    $datas->items[$key]['list_kontak'][] = $data1;
                }
            }
        }
        $kontak = $this->kontak;

        return render_template('public/contact/index', compact('datas', 'kontak'));
    }

    public function create(Request $request)
    {
        ini_set('default_socket_timeout', 360);
        $mail = new PHPMailer();
        $mail_body = file_get_contents(__DIR__ . '/../../../pages/email.php');
        $datas = $request->request->all();
        //dd($datas);

        if (count($datas) > 0) {
            //foreach ($datas as $key => $value) {
            $mail_body = str_replace('phone', $datas['phone'], $mail_body);
            $mail_body = str_replace('nama', $datas['name'], $mail_body);
            $mail_body = str_replace('email', $datas['email'], $mail_body);
            $mail_body = str_replace('company', $datas['company'], $mail_body);
            $mail_body = str_replace('subject', $datas['subject'], $mail_body);
            $mail_body = str_replace('message', $datas['message'], $mail_body);
            //}
        }

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = env("EMAIL");                 // SMTP username
        $mail->Password = env("PASSWORD");                           // SMTP password
        $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, ssl also accepted
        $mail->Port = env("SMTP_PORT");                                    // TCP port to connect to

        $mail->setFrom(env("EMAIL"));
        $mail->addAddress("techoff@sinovatif.com");     // Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        /* if (count($email_cc) > 0) {
            foreach ($email_cc as $key => $value) {
                $mail->addCC($value);
            }
        }*/

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $datas['subject'];
        $mail->Body = $mail_body;

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            die();
        }

        return new RedirectResponse('/contact');
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/contact');
    }

    public function edit(Request $request)
    {


        return render_template('public/contact/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/contact');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/contact');
    }
}
