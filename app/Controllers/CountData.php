<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class CountData extends ResourceController
{  
    protected $modelName = 'App\Models\CountDataModel';
    protected $format = 'json';
    
    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK'
        ], 200);
    }

    public function referensiCount(){
        $data = $this->model->getReferensiCount();
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'      => $data
        ], 200);
    }

    public function suratMasukCount(){
        $data = $this->model->getSuratMasukCount();
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'      => $data
        ], 200);
    }

    public function suratKeluarCount(){
        $data = $this->model->getSuratKeluarCount();
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'      => $data
        ], 200);
    }

    public function disposisiCount(){
        $data = $this->model->getDisposisiCount();
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'      => $data
        ], 200);
    }

    
}
