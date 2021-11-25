<?php

class Response_Types {

    function success_response(&$arg) {

        $response['status'] = '200';
        $response['response'] = $arg;
        $response['response_message'] = 'Success';
        echo json_encode($response);
    }
    function success_response_nestedArray(&$arg1,&$arg2) {

        $response['status'] = '200';
        $response['response1'] = $arg1;
        $response['response2'] = $arg2;
        $response['response_message'] = 'Success';
        echo json_encode($response);
    }

    function success_response_noarg() {

        $response['status'] = '200';
        $response['response'] = [];
        $response['response_message'] = 'Success';
        echo json_encode($response);
    }

    function NoRecords() {

        $response['status'] = '201';
        $response['response'] = [];
        $response['response_message'] = 'No Records Found';
        echo json_encode($response);
    }

    function UnAuthorized() {

        $response['status'] = '401';
        $response['response'] = [];
        $response['response_message'] = 'UnAuthorized Access';
        echo json_encode($response);
    }

    function BadRequest($msg) {
        $response['status'] = '400';
        $response['response'] = [];
        $response['response_message'] = $msg;
        echo json_encode($response);
    }

    function InternalServerError() {

        $response['status'] = '500';
        $response['response'] = [];
        $response['response_message'] = 'InternalServerError';
        echo json_encode($response);
    }

    function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}

?>