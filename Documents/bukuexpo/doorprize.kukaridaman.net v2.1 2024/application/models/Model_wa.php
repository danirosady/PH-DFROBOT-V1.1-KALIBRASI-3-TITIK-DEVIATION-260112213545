<?php
class Model_wa extends CI_Model 
{
    public function get_token(){
                
        $curl = curl_init();
                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://api.chat.wappin.app/v1/users/login',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_HTTPHEADER => array(
                                                                'Content-Type: application/json',
                                                                'Authorization: Basic a29taW5mbzIwMjM6alh4cDNUQ0M3Yjkj'
                                                                ),
                ));

                                        $response = curl_exec($curl);
                                        curl_close($curl);
                                        return json_decode($response);
    }

    public function bukuexpo_general($telp, $info, $token){
                $curl2 = curl_init();
                curl_setopt_array($curl2, array(
                    CURLOPT_URL => 'https://api.chat.wappin.app/v1/messages',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                                "to": "'.$telp.'",
                                "type": "template",
                                "template": {
                                        "name": "bukuexpo_general",
                                        "namespace": "bukuexpo_general",
                                        "language": {
                                                        "policy": "deterministic",
                                                        "code": "id"
                                                    },
                                        "components": [
                                                    {
                                                        "type": "body",
                                                        "parameters":   [
                                                                        {
                                                                            "type": "text",
                                                                            "text": "'.$info.'"
                                                                        }
                                                                                                                
                                                                        ]
                                                    }
                                                    ]
                                            }
                                }',
                    CURLOPT_HTTPHEADER => array(
                                            'Content-Type: application/json',
                                            'Authorization: Bearer ' . $token
                                        ),
                    ));
                                                                
                    $response2 = curl_exec($curl2);                                                         
                    curl_close($curl2);
        }


}
?>