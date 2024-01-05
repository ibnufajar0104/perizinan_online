<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jwt extends CI_Model
{
    public function get_token()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => ip() . 'login_jwt',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "username" : "ibnufajar",
            "password" : "laptopasus123"
        }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        try {
            $response = curl_exec($curl);

            if ($response === false) {
                throw new Exception('cURL Error: ' . curl_error($curl));
            }

            // Decode JSON response to an array
            $responseArray = json_decode($response, true);

            if ($responseArray === null) {
                throw new Exception('Error decoding JSON response.');
            }

            return $responseArray;
        } catch (Exception $e) {
            return array(
                'status' => false,
                'msg' => $e->getMessage(),
            );
        } finally {
            curl_close($curl);
        }
    }

    public function request($url, $method = 'GET', $data = null, $token = null)
    {
        $curl = curl_init();

        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } elseif ($method === 'GET') {
            if ($data) {
                $url .= '?' . http_build_query($data);
            }
        }

        $headers = array(
            'Content-Type: application/json',
        );

        if ($token) {
            $headers[] = 'Authorization: Bearer ' . $token['token'];
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => $headers,
        ));

        try {
            $response = curl_exec($curl);

            if ($response === false) {
                throw new Exception('cURL Error: ' . curl_error($curl));
            }

            // Decode JSON response to an array
            $responseArray = json_decode($response, true);

            if ($responseArray === null) {
                throw new Exception('Error decoding JSON response.');
            }

            return $responseArray;
        } catch (Exception $e) {
            return array(
                'status' => false,
                'msg' => $e->getMessage(),
            );
        } finally {
            curl_close($curl);
        }
    }

    public function pos_request($url, $postData, $token)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token['token']
            ),
        ));

        try {
            $response = curl_exec($curl);

            if ($response === false) {
                throw new Exception('cURL Error: ' . curl_error($curl));
            }

            // Decode JSON response to an array
            $responseArray = json_decode($response, true);

            if ($responseArray === null) {
                throw new Exception('Error decoding JSON response.');
            }

            return $responseArray;
        } catch (Exception $e) {
            return array(
                'status' => false,
                'msg' => $e->getMessage(),
            );
        } finally {
            curl_close($curl);
        }
    }
}
