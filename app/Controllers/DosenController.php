<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dosen;

class DosenController extends BaseController
{
    public $dosen;

    public function __construct()
    {
        $this->dosen = new Dosen();
    }

    public function index()
    {
        $data = $this->dosen->findAll();
        // dd($data);
        return view('dosen/index', compact('data'));
    }

    public function tambah()
    {
        return view('dosen/tambah');
    }

    public function tambahdosen()
    {
        $this->dosen->insert([
            'id' => $this->request->getPost('id'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'golongan' => $this->request->getPost('golongan'),
            'gaji' => $this->request->getPost('gaji'),
        ]);

        session()->setFlashdata('success', 'Data Created Successfully');

        return redirect('dosen/index');
    }
    public function editdosen($id)
    {

        $data = $this->dosen->find($id);
        // dd($data);
        return View('dosen/edit', compact('data'));
    }

    public function updatedosen($id)
    {

        $this->dosen->update($id, [
            'id' => $this->request->getPost('id'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'golongan' => $this->request->getPost('golongan'),
            'gaji' => $this->request->getPost('gaji'),
        ]);

        return redirect('dosen')->with('success', 'Data Updated Successfully');
    }
    public function deletedosen($id)
    {

        $this->dosen->delete($id);

        session()->setFlashdata('success', 'Data Deleted Successfully');

        return redirect('dosen');
    }
}
