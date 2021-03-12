<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class NomorSurat extends ResourceController
{
    protected $modelName = 'App\Models\NomorSuratModel';
    protected $format = 'json';

    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_nomor_surat', 'DESC')->findAll()
        ], 200);
    }
 
    public function show($id = null)
    {
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->find($id)
        ], 200);
    }

    public function update($id = null)
    {
        //model
        $post = $this->model;

        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {
            
                $json = $this->request->getJSON();
                $post->update($id, [
                    'nomor_agenda'     => $json->nomor_agenda
                ]);
            } else {
                
                //get request from PostMan and more
                $data = $this->request->getRawInput();
                $post->update($id, $data);

            }

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Diupdate!',
            ], 200);
        }
    }

    public function delete($id = null)
    {
        $post = $this->model->find($id);

        if($post) {

            $this->model->delete($id);

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK'
            ], 200);

        }
    }

}
