<?php

namespace App\Livewire;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class TambahProduk extends Component
{
    public $nama, $harga, $berat, $gambar;

    use WithFileUploads ;

    public function mount()
    {
        if(Auth::user())
        {
            if(Auth::user()->level !== 1)
            {
                return redirect()->to('');
            }
        }
    }

    public function store()
    {
        // validasi
        $this->validate([
            'nama'      => 'required',
            'harga'     => 'required',
            'berat'     => 'required',
            'gambar'    => 'required|image|mimes:png,jpg,jpeg,heic|max:2048',
        ]);

        // proses data file gambar
        $nama_gambar = md5($this->gambar . microtime()).'.'.$this->gambar->extension();
        Storage::disk('public')->putFileAs('photos', $this->gambar, $nama_gambar);

        // Simpan produk ke database (contoh)
        Produk::create([
            'nama'   => $this->nama,
            'harga'  => $this->harga,
            'berat'  => $this->berat,
            'gambar' => $nama_gambar,
        ]);

        return redirect()->to('');
    }

    public function render()
    {
        return view('livewire.tambah-produk')
            ->extends('layouts.app')
            ->section('content');;
    }
}
