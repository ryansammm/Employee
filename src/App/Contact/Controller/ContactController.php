<?php

namespace App\Contact\Controller;

use App\Kontak\Model\Kontak;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Contact\Validation\ContactValidation;
use Core\Classes\SessionData;
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

        $errors = SessionData::get()->getFlashBag()->get('errors');
        $success = SessionData::get()->getFlashBag()->get('success');

        return render_template('public/contact/index', compact('datas', 'kontak', 'errors', 'success'));
    }

    public function create(Request $request)
    {
        if ($request->request->get('g-recaptcha-response')) {
            $captcha = $request->request->get('g-recaptcha-response');
            $secretKey = "6Ldif3EdAAAAAJx2RlrTsNYdqNJs-Az2kQz5fpm8";
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response, true);
            // should return JSON with success as true
            if (!$responseKeys["success"]) {
                SessionData::get()->getFlashBag()->add('errors', ['captcha' => 'Pengisian captcha gagal!']);

                return new RedirectResponse('/contact#captcha');
            }
        } else {
            SessionData::get()->getFlashBag()->add('errors', ['captcha' => 'Captcha wajib diisi!']);

            return new RedirectResponse('/contact#captcha');
        }

        $validasi = new ContactValidation($request);
        $validasiTest = $validasi->validate();
        if (!$validasiTest->passed) {
            return new RedirectResponse('/contact');
        }

        ini_set('default_socket_timeout', 360);
        $mail = new PHPMailer();
        $mail_body = file_get_contents(__DIR__ . '/../../../pages/email.php');
        $datas = $request->request->all();

        $mail_body = str_replace('phone', $datas['phone'], $mail_body);
        $mail_body = str_replace('nama', $datas['name'], $mail_body);
        $mail_body = str_replace('email', $datas['email'], $mail_body);
        $mail_body = str_replace('company', $datas['company'], $mail_body);
        $mail_body = str_replace('subject', $datas['subject'], $mail_body);
        $mail_body = str_replace('message', $datas['message'], $mail_body);

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
        } else {
            SessionData::get()->getFlashBag()->set('success', "Pesan anda telah terkirim! silakan ditunggu balasannya");
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
