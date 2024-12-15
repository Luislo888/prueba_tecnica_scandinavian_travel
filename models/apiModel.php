<?php

class apiModel
{
    private function generate_string($length = 12)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, $length);
    }

    private function saveLog($response, $stage)
    {
        $dateTime = date('d-m___H-i-s');
        $directory = '../logs/';
        $filename = "{$directory}{$stage} {$dateTime}.json";
        $fp = fopen($filename, 'w');
        fwrite($fp, $response);
        fclose($fp);
    }

    public function postCheckOutApi($access_key, $secret_key, $method, $base_url, $path, $body)
    {
        $http_method = $method;
        $salt = $this->generate_string();
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $body_string = !is_null($body) ? json_encode($body, JSON_UNESCAPED_SLASHES) : '';

        $sig_string = "$http_method$path$salt$timestamp$access_key$secret_key$body_string";
        $hash_sig_string = hash_hmac("sha256", $sig_string, $secret_key);
        $signature = base64_encode($hash_sig_string);

        $request_data = NULL;

        $request_data = array(
            CURLOPT_URL => "$base_url$path",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body_string
        );

        $curl = curl_init();
        curl_setopt_array($curl, $request_data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "access_key: $access_key",
            "salt: $salt",
            "timestamp: $timestamp",
            "signature: $signature"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $this->saveLog($response, "cheCkout");

        if ($err) {
            throw new Exception("cURL Error #:" . $err);
        } else {
            return json_decode($response, true);
        }
    }
}
