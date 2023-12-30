<?php

namespace Components;


if (class_exists('ExternalAPIHandler')) return;
// Generic API handler and External Url caller
class ExternalAPIHandler
{
    private $curl = null;
    private $BaseUrl = "";
    public function __construct($baseUrl)
    {
        $this->BaseUrl = $baseUrl;
        $this->curl = curl_init();
    }

    public function Get($endpoint, $headers)
    {
        return $this->Execute($endpoint, $headers, null, 'GET');
    }

    public function Post($endpoint, $headers, $data)
    {
         return $this->Execute($endpoint, $headers, $data, 'POST');
    }

    public function Put($endpoint, $headers, $data)
    {
        return $this->Execute($endpoint, $headers, $data, 'PUT');
    }

    public function Delete($endpoint, $headers, $data = null)
    {
        return $this->Execute($endpoint, $headers, $data, 'DELETE');
    }

    private function Execute($endpoint, $headers, $data = null, $method = "GET")
    {

        $this->SetupCurl($endpoint, $headers, $data, $method);
        
        $result = curl_exec($this->curl);

        $var = curl_getinfo($this->curl);
        $jsonResult = json_decode($result);
        $error = curl_error($this->curl);
        $status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        $dResult =
            [                
            "METHOD" => $_SERVER['REQUEST_METHOD'],
            "Headers" => $headers,
            "Data" => $data,
            "EndPoint" => $endpoint,
            "CURL Options" => curl_getinfo($this->curl),
            "Status" => $status,
            "JSON" => $jsonResult,
            "ERROR" => $error,
            "DataReturnedFromRequest" => $result,
            "REQUEST" => $_REQUEST,
            "SERVER" => $_SERVER,
            "POST DATA" => $data,
            "POST FILE DATA" => file_get_contents("php://input"),
            "DECODED JSON" => $this->DecodeJson(file_get_contents("php://input"))
        ];
                

        curl_close($this->curl);


        $jsonResult = json_decode(json_encode($jsonResult), true);
        return $jsonResult;
    }

    public function DecodeJson($data)
    {
        $json = rtrim($data, "\0");
        $json = stripslashes(html_entity_decode($json));
        $json = json_decode($json);
        return $json;
    }

    private function SetupCurl($endpoint, $headers, $data, $method = "GET")
    {

        $this->SetUrl($endpoint);
        $this->SetHeaders($headers);

        $this->SetupMethod($method, $data);

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($this->curl, CURLOPT_ENCODING, "");
        curl_setopt($this->curl, CURLOPT_MAXREDIRS, 30);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 120);
        //curl_setopt($this->curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    }

    private function SetupMethod($method, $data)
    {
        if (isset($data)) {
            $data = json_encode($data);
        }
        
        switch ($method) {
            case "POST":

                $temp = CURLOPT_CUSTOMREQUEST;

                curl_setopt($this->curl, CURLOPT_POST, 1);
                if (isset($data)) {
                    curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
                }
               
                break;
            case "PUT":
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if (isset($data)) {
                    curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "DELETE":
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                if (isset($data)) {
                    curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }

        }
    }

    private function SetHeaders($headers)
    {
        if (isset($headers)) {
            if (sizeof($headers) > 0) {
                curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
            }
        }
    }

    private function SetUrl($endpoint)
    {
        $url = $this->BaseUrl . $endpoint;
        curl_setopt($this->curl, CURLOPT_URL, $url);
    }
}
