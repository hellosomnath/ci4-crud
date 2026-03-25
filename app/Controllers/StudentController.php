<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StudentModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class StudentController extends BaseController
{   
    public function register()
    {
        return view('student/register', ['page_title'=> ' | Register']);
    }

    public function doRegiter()
    {
        $rules = [
            'fname' => [
                'rules' => 'required|min_length[3]',
                'label' => 'First Name'
            ],
            'lname' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Last Name'
            ],
            'email' => [
                'rules' => 'required|min_length[3]|valid_email|is_unique[student.email]',
                'label' => 'Email'
            ],
            'image' => [
                'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Image'
            ]
        ];

        if (!$this->validate($rules)) {
            return view('student/register', ['validator' => $this->validator]);
        }

        $data = [
            'first_name'    => $this->request->getPost('fname'),
            'last_name'     => $this->request->getPost('lname'),
            'email'         => $this->request->getPost('email'),
            'phone'         => $this->request->getPost('phone'),
        ];

        $file = $this->request->getFile('image');
        if (file_exists($file)) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName); 
            $data['image'] = $newName;
        }

        $student = new StudentModel();
        $student->save($data);
        return redirect()->to('student/list')->with('status', 'Student registered successfully');
    }

    public function index()
    {
        $students = new StudentModel();
        $data = $students->findAll();
        return view('student/list', ['students' => $data, 'page_title' => ' | List']);
    }

    public function edit($id)
    {
        $student = new StudentModel();
        $data['student'] = $student->find(base64_decode($id));
        return view('student/edit', $data);
    }

    public function update($id)
    {
        $id = base64_decode($id);
        $rules = [
            'fname' => [
                'rules' => 'required|min_length[3]',
                'label' => 'First Name'
            ],
            'lname' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Last Name'
            ],
            'email' => [
                'rules' => 'required|min_length[3]|valid_email',
                'label' => 'Email'
            ],
            'image' => [
                'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Image'
            ]
        ];

        $student = new StudentModel();
        if(!$this->validate($rules)) {
            return view('student/edit', ['validator' => $this->validator, 'student' => $student->find($this->request->getPost('id'))]);
        }

        $file = $this->request->getFile('image');
        if (file_exists($file)) {
            $st = $student->find($id);
            if ($st['image']) {
                $file_path = FCPATH . 'public\uploads\\' . $st['image'];
                unlink($file_path); // Delete the file
            } 
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName); 
            $data['image'] = $newName; 
        }

        $data['first_name'] = $this->request->getPost('fname');
        $data['last_name'] = $this->request->getPost('lname');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');

        $student->update($id, $data);
        return redirect()->to('student/list')->with('status', 'Student data updated successfully');
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $student = new StudentModel();
        $data = $student->find($id);

        if ($data['image']) {
            $file_path = FCPATH . 'public\uploads\\' . $data['image'];
            unlink($file_path); // Delete the file
        } 
        $student->delete($id);
        return redirect()->to('student/list')->with('status', 'Student deleted successfully');
    }
}
