<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class User extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';

    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_user', 'DESC')->findAll()
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

                $date = $json->tanggal_surat;
                $date = date('Y-m-d', strtotime($date));

                $post = $this->model->insert([
                    'id_user'    => uniqid(),
                    'username'       => $json->username,
                    'password'        => sha1(md5($json->asal_surat)),
                    'level'        => $json->level
                ]);

            } else {

                //get request from PostMan and more
                $date = $this->request->getPost('tanggal_surat');
                $date = date('Y-m-d', strtotime($date));

                $post = $this->model->insert([
                    'id_user'    => uniqid(),
                    'username'       => $this->request->getPost('username'),
                    'password'        => sha1(md5($this->request->getPost('password'))),
                    'level'       => $this->request->getPost('level')
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

    public function checkLogin(){
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {

                $json = $this->request->getJSON();
                $username = $json->username;
                $password = sha1(md5(($json->password)));

                $data1 = $this->model->checkLogin($username, $password);
                $data2 = $this->model->select(['username', 'level', 'id_user', 'name'])->where(['username' => $username, 'password' => $password])->find();
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => 'OK',
                    'status'      => $data1,
                    'resp'      => $data2
                ], 200);
            } else {

                //get request from PostMan and more
                $username = $this->request->getPost('username');
                $password = sha1(md5(($this->request->getPost('password'))));

                $data1 = $this->model->checkLogin($username, $password);
                $data2 = $this->model->where(['username' => $username, 'password' => $password])->find();
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => 'OK',
                    'status'      => $data1,
                    'resp'      => json_encode($data2)
                ], 200);
            }
        }
    }

    public function getUserList(){
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {
                return 'a';
                $id = $this->request->uri->getSegments();
                $id = $id[count($id)-1];

                $data = $this->model->select(['username', 'id_user', 'name', 'level'])->where(['id_user !=' => $id, 'level !=' => 2])->findAll();
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => 'OK',
                    'status'      => $data
                ], 200);
            } else {
                //get request from PostMan and more
                $id = $this->request->uri->getSegments();
                $id = $id[count($id)-1];

                $data = $this->model->select(['username', 'id_user', 'name', 'level'])->where(['id_user !=' => $id, 'level !=' => 2])->findAll();
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => 'OK',
                    'status'      => $data
                ], 200);
            }
        }
    }
}
