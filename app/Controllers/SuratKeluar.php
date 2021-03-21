<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class SuratKeluar extends ResourceController
{
    protected $modelName = 'App\Models\SuratKeluarModel';
    protected $format = 'json';

    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_surat_keluar', 'DESC')->findAll()
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
                $file->move('uploads/surat_keluar', $namafile);
            }else{
                return $this->respond([
                    'statusCode' => 304,
                    'message'    =>  "File Tidak Tersedia"
                ], 304);
            }
            
            $date = $this->request->getVar('tanggal_surat');
            $date = date('Y-m-d', strtotime($date));
            
			$data = [
                'id_surat_keluar'   => uniqid(),
                    'nomor_surat'       => $this->request->getVar('nomor_surat'),
                    'perihal'           => $this->request->getVar('perihal'),
                    'tempat'            => $this->request->getVar('tempat'),
                    'waktu'             => $this->request->getVar('waktu'),
                    'tujuan'            => $this->request->getVar('tujuan'),
                    'isi_surat'         => $this->request->getVar('isi_surat'),
                    'file'              => $namafile,
                    'tanggal_surat'     => $date,
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
                $file->move('uploads/surat_keluar', $namafile);
                unlink('uploads/surat_keluar/'.$this->request->getVar('file_lama'));
            }else{
                $namafile = $this->request->getVar('file_lama');
            }


            $date = $this->request->getVar('tanggal_surat');
            $date = date('Y-m-d', strtotime($date));
            $data = [
                'nomor_surat'       => $this->request->getVar('nomor_surat'),
                'perihal'           => $this->request->getVar('perihal'),
                'tempat'            => $this->request->getVar('tempat'),
                'waktu'             => $this->request->getVar('waktu'),
                'tujuan'            => $this->request->getVar('tujuan'),
                'isi_surat'         => $this->request->getVar('isi_surat'),
                'tanggal_surat'     => $date,
				'file' => $namafile,
                $this->request->getVar('id_user')
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
            unlink('uploads/surat_keluar/'.$post['file']);
            $this->model->delete($id);

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK'
            ], 200);

        }
    }

}
