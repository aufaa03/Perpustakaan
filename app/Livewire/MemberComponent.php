<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class MemberComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama, $telepon, $email, $alamat, $password, $search, $id;
    public function render()
    {
        if ($this->search != "") {
            $data['member'] = User::where('role', 'member')->where(function($query) {
                $query->orWhere('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })->paginate(5);
        } else {
            $data['member'] = User::where('role', 'member')->paginate(5);
        }
        $layout['title'] = 'Kelola Member';
        return view('livewire.member-component', $data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Harus diisi',
            'telepon.required' => 'Telepon Harus diisi',
            'email.required' => 'Email Harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
        ]);
        User::create([
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'alamat' => $this->alamat,
            'role' => 'member',
        ]);
        return redirect('admin/member')->with('success', 'Data member berhasil ditambahkan');
    }
    public function edit( $id ){
        $member = User::find($id);
        $this->id = $member->id;
        $this->nama = $member->nama;
        $this->telepon = $member->telepon;
        $this->email = $member->email;
        $this->alamat = $member->alamat;

    }
    public function update() {
        $member = User::find($this->id);
        $member->update([
          'nama' => $this->nama,
          'telepon' => $this->telepon,
          'email' => $this->email,
          'alamat' => $this->alamat,
          'role' => 'member',
        ]);
        return redirect(('admin/member'))->with('success', 'Data member berhasil diupdate');
    }
    public function confirmDelete($id){
        $this->id = $id;
    }
    public function destroy(){
        $member = User::find($this->id);
        $member->delete();
        return redirect('admin/member')->with('success', 'Data member berhasil dihapus');
    }
}
