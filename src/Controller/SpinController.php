<?php

namespace Src\Controller;

use Src\TableGateways\SpinGateway;

class SpinController
{
    private $db;
    private $requestMethod;
    private $spinId;
    private $spinGateway;

    public function __construct($db, $requestMethod, $spinId)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->spinId = $spinId;
        $this->spinGateway = new SpinGateway($db);
    }
    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->spinId) {
                    $response = $this->getSpin($this->spinId);
                } else {
                    $response = $this->getAllSpin();
                }
                break;
            case 'PUT':
                $response = $this->updateSpin($this->spinId);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllSpin()
    {
        $result = $this->spinGateway->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
    private function getSpin($id)
    {
        $result = $this->spinGateway->find($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
    private function updateSpin($id)
    {
        $result = $this->spinGateway->find($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $input = (array) json_decode(file_get_contents('php://input', TRUE));
        if (!$this->validateSpin($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->spinGateway->update($id, $input);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }
    private function validateSpin($input)
    {
        if (!isset($input['name'])) {
            return false;
        }
        if (!isset($input['count'])) {
            return false;
        }
        if (!isset($input['total'])) {
            return false;
        }
        if (!isset($input['url'])) {
            return false;
        }
        return true;
    }
    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }
    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}
