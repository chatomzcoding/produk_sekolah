<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class Members extends Component
{
    public $members, $name, $email, $phone_number, $status, $member_id;
    public $isModal = 0;

    // fungsi ini untuk me-load view yang akan menjadi tampilan halaman member
    public function render()
    {
        $this->members = Member::orderBy('created_at','DESC')->get(); // membuat query untuk mengambil data
        return view('livewire.members')->layout('layouts.admin'); //load view 
    }

    // fungsi ini untuk dipanggil ketika tombol tambah anggota ditekan
    public function create()
    {
        // kemudian didalamnya kita menjalankan fungsi untuk mengosongkan field
        $this->resetFields();
        // dan membuka modal
        $this->openModal();
    }

    // fungsi ini untuk menutup modal dimana variable ismodal kita set jadi false
    public function closeModal()
    {
        $this->isModal = false;
    }
    
    // fungsi ini untuk membuka modal
    public function openModal()
    {
        $this->isModal = true;
    }

    // fungsi ini untuk me-reset filed/kolom, sesuaikan dengan field yang ada di table
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->status = '';
        $this->member_id = '';
    }
    
    // fungsi store akan meng-handle untuk menyimpan / update data
    public function store()
    {
        // membuat validasi
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:members,email,' .$this->member_id,
            'phone_number' => 'required|numeric',
            'status' => 'required',
        ]);

        // query untuk menyimpan/memperbaharui data menggunakan update or create
        // dimana id menjadi unique id, jika idnya tersedia, maka update datanya
        // jika tidak maka tambahkan data baru
        Member::updateOrCreate(['id' => $this->member_id], [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'status' => $this->status,
        ]);

        // buat flash session untuk menampilkan alert notifikasi
        session()->flash('message', $this->member_id ? $this->name . ' Diperbaharui' : $this->name . 'Ditambahkan');
        $this->closeModal(); // tutup modal
        $this->resetFields(); // dan bersihkan field
    }

    // fungsi ini untuk mengambil data dari database berdasarkan id member
    public function edit($id)
    {
        $member = Member::find($id); // buat query untuk pengambilan data
        // lalu assign kedalam masing - masing property datanya
        $this->member_id = $id;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->phone_number = $member->phone_number;
        $this->status = $member->status;

        $this->openModal(); // lalu buka modal
    }

    // fungsi ini untuk menghapus data
    public function delete($id)
    {
        $member = Member::find($id); // buat query untuk pengambilan data sesuai id
        $member->delete(); // lalu hapus data
        session()->flash('message', $member->name . ' Dihapus'); // dan buat flash message untuk notifikasi
    }
}
