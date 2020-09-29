<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class Referensi extends ResourceController
{
    protected $modelName = 'App\Models\ReferensiModel';
    protected $format = 'json';

    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_referensi', 'ASC')->findAll()
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

    public function create()
    {
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {

                $json = $this->request->getJSON();

                $post = $this->model->insert([
                    'id_referensi'      => uniqid(),
                    'kode'            => $json->kode,
                    'nama'           => $json->nama,
                    'uraian'             => $json->uraian,
                    'user'              => 'admin'
                ]);

            } else {

                //get request from PostMan and more
                $post = $this->model->insert([
                    'id_referensi'      => uniqid(),
                    'kode'            => $this->request->getPost('kode'),
                    'nama'            => $this->request->getPost('nama'),
                    'uraian'            => $this->request->getPost('uraian'),
                    'user'              => 'admin'
                ]);

            }

            return $this->respond([
                'statusCode' => 201,
                'message'    => 'Data Berhasil Disimpan!'
            ], 201);
        }
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
                
                $post->update($json->id, [
                    'title'     => $json->title,
                    'content'   => $json->content
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
