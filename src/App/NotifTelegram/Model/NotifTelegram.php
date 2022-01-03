<?php

namespace App\NotifTelegram\Model;

use Core\Model;

class NotifTelegram extends Model
{
    // protected $table = 'name';
    // protected $primaryKey = 'id_name';

    public function telegram($msg)
    {


        $curl = curl_init();

        $tes = 'https://api.telegram.org/bot5073900363:AAHHLdHrCfm4M1HPbNAOx1lwHOvpRmium4k/sendmessage?chat_id=1669128873&text=' . $msg . '&parse_mode=html';
        // $tes = 'https://api.telegram.org/bot5093975473:AAF554ygMomNVH7taLLAikebVAImqBISQkQ/sendmessage?chat_id=626917343&text=' . $msg . '&parse_mode=html';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $tes,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: PHPSESSID=b38669be2cacc0d778faf68b3d5fe35a'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function contentNotification($msg)
    {


        $curl = curl_init();

        $url = 'https://api.telegram.org/bot5083690698:AAGfpuc1L5T9HIq8viKuirW2cgIzzXt4f5I/sendmessage?chat_id=626917343&text=' . $msg . '&parse_mode=html';
        // $tes = 'https://api.telegram.org/bot5083690698:AAGfpuc1L5T9HIq8viKuirW2cgIzzXt4f5I/sendmessage?chat_id=1669128873&text=' . $msg . '&parse_mode=html';
        // $tes = 'https://api.telegram.org/bot5093975473:AAF554ygMomNVH7taLLAikebVAImqBISQkQ/sendmessage?chat_id=626917343&text=' . $msg . '&parse_mode=html';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: PHPSESSID=b38669be2cacc0d778faf68b3d5fe35a'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
