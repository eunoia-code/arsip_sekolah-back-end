<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class Disposisi extends ResourceController
{
    protected $modelName = 'App\Models\DisposisiModel';
    protected $format = 'json';

    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_disposisi', 'DESC')->findAll()
        ], 200);
    }
 
    public function show($id = null)
    {
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->getDataDisposisiDetail($id)->getResult()
        ], 200);
    }

    public function create()
    {
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {

                $json = $this->request->getJSON();

                $date = $json->batas_waktu;
                $date = date('Y-m-d', strtotime($date));

                $post = $this->model->insert([
                    'id_disposisi'      => uniqid(),
                    'tujuan'            => $json->tujuan,
                    'isi_disposisi'     => $json->isi_disposisi,
                    'catatan'           => $json->catatan,
                    'sifat'             => $json->sifat,
                    'batas_waktu'       => $date,
                    'id_surat_masuk'    => $json->id_surat_masuk,
                    'user'              => $json->id_user
                ]);

            } else {

                //get request from PostMan and more
                $date = $this->request->getPost('batas_waktu');
                $date = date('Y-m-d', strtotime($date));

                $post = $this->model->insert([
                    'id_disposisi'      => uniqid(),
                    'tujuan'            => $this->request->getPost('tujuan'),
                    'isi_disposisi'     => $this->request->getPost('isi_disposisi'),
                    'sifat'             => $this->request->getPost('sifat'),
                    'catatan'             => $this->request->getPost('catatan'),
                    'batas_waktu'       => $date,
                    'id_surat_masuk'    => $this->request->getPost('id_surat_masuk'),
                    'user'              => $this->request->getPost('id_user')
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
