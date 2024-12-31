<?php

use App\Models\User;
use App\Livewire\HomeComponent;
use App\Livewire\LoginComponent;
use App\DataTables\UserDataTable;
use App\Http\Controllers\admin\UserController;
use App\Livewire\BukuComponent;
use App\Livewire\HistoryComponent;
use App\Livewire\KategoriComponent;
use App\Livewire\KembaliComponent;
use App\Livewire\MemberComponent;
use App\Livewire\PinjamComponent;
use App\Livewire\UserComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->middleware('auth')->name('home');
Route::get('admin/user', UserComponent::class)->middleware('auth')->name('user');
Route::get('/admin/member', MemberComponent::class)->name('member')->middleware('auth');
Route::get('admin/kategori', KategoriComponent::class)->middleware('auth')->name('kategori');
Route::get('admin/buku',BukuComponent::class)->middleware('auth')->name('buku');
Route::get('admin/pinjam', PinjamComponent::class)->middleware('auth')->name('pinjam');
Route::get('admin/pengembalian', KembaliComponent::class)->middleware('auth')->name('pengembalian');
Route::get('admin/history',HistoryComponent::class)->middleware('auth')->name('history');

Route::get('/login',LoginComponent::class)->name('login');
Route::get('logout',[LoginComponent::class,'logout'])->name('logout');
