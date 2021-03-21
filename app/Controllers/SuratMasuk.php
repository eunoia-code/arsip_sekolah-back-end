<?php 
namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
class SuratMasuk extends ResourceController
{
    protected $modelName = 'App\Models\SuratMasukModel';
    protected $format = 'json';

    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_surat_masuk', 'DESC')->findAll()
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
        helper('form');
        
        if ($this->request)
        {
            //Get the file
            $namafile='';
			if($this->request->getFile('file_dokumen')){
                $file = $this->request->getFile('file_dokumen');
                $namafile = $file->getRandomName();
                $file->move('uploads/surat_masuk', $namafile);
            }else{
                return $this->respond([
                    'statusCode' => 304,
                    'message'    =>  "File Tidak Tersedia"
                ], 304);
            }
            
            $date = $this->request->getVar('tanggal_surat');
            $date = date('Y-m-d', strtotime($date));
            
			$data = [
                'id_surat_masuk' => uniqid(),
				'isi_surat' => $this->request->getVar('isi_surat'),
				'nomor_surat' => $this->request->getVar('nomor_surat'),
				'asal_surat' => $this->request->getVar('asal_surat'),
				'tanggal_surat' => $date,
				'file' => $namafile,
                'user'              => $this->request->getVar('id_user')
			];
            
			$this->model->insert($data);
			// return $this->respondCreated($data);
            return $this->respond([
                'statusCode' => 201,
                'message'    =>  "Berhasil menambahkan data"
            ], 201);
        }
    }

    public function update($id = null)
    {
        //model
        helper('form');
        $post = $this->model;

        // return $this->request->getVar('isi_surat');
        if ($this->request)
        {
            $id = $this->request->uri->getSegments();
            $id = $id[count($id)-1];

            $namafile='';
			if($this->request->getFile('file_dokumen')){
                $file = $this->request->getFile('file_dokumen');
                $namafile = $file->getRandomName();
                $file->move('uploads/surat_masuk', $namafile);
                unlink('uploads/surat_masuk/'.$this->request->getVar('file_lama'));
            }else{
                $namafile = $this->request->getVar('file_lama');
            }

            $date = $this->request->getVar('tanggal_surat');
            $date = date('Y-m-d', strtotime($date));
            $data = [
                'id_surat_masuk' => uniqid(),
				'isi_surat' => $this->request->getVar('isi_surat'),
				'nomor_surat' => $this->request->getVar('nomor_surat'),
				'asal_surat' => $this->request->getVar('asal_surat'),
				'tanggal_surat' => $date,
				'file' => $namafile,
                'user'              => $this->request->getVar('id_user')
			];

            $post->update($id, $data);
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
            
            unlink('uploads/surat_masuk/'.$post['file']);
            $this->model->delete($id);

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK'
            ], 200);

        }
    }

}
