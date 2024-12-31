<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama, $email, $password, $id, $search;
    public function render()
    {
        $layout['title'] = 'Kelola User';
        if ($this->search != "") {
            $data['user'] = User::where('role', 'admin')->where(function ($query) {
                $query->orWhere('nama', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
            })->paginate(5); //tambahkan logic untuk jika data kosong++
        } else {
            $data['user'] = User::where('role', 'admin')->paginate(5);
        }
        return view('livewire.user-component', $data)->layoutData($layout);
    }
    public function store()
    {
        $this->validate(
            [
                'nama' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi'
            ]
        );
        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'admin',
        ]);
        return redirect('admin/user')->with('success', 'Data user berhasil Ditambahkan');
        // session()->flash('success', 'Data user berhasil ditambahkan');
        // $this->reset();

    }
    public function edit($id)
    {
        $user = User::find($id);
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->id = $user->id;
        // $this->password = $user->password;

    }
    public function update()
    {
        $user = User::find($this->id);
        if ($this->password == "") {
            $user->update([
                'nama' => $this->nama,
                'email' => $this->email,
            ]);
        } else {
            # code...
            $user->update([
                'nama' => $this->nama,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
        }
        return redirect('admin/user')->with('success', 'Data user berhasil Diupdate');
    }
    public function confirmDelete($id)
    {
        $this->id = $id;
    }
    public function destroy()
    {
        $user = User::find($this->id);
        $user->delete();
        return redirect('admin/user')->with('success', 'Data user berhasil Dihapus');
    }
}
