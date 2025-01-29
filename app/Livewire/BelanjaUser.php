<?php

namespace App\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BelanjaUser extends Component
{
    public $belanja = [];

    public function mount() {
        // autentikasi
        if (!Auth::user())
        {
            return redirect()->route('login');
        }
    }

    public function destroy($pesanan_id)
    {
        $pesanan = Belanja::find($pesanan_id);
        $pesanan->delete();
    }

    public function render()
    {
        // autentikasi
        if (Auth::user())
        {
            $this->belanja = Belanja::where('user_id', Auth::user()->id)->get();
        }

        return view('livewire.belanja-user')
            ->extends('layouts.app')
            ->section('content');
    }
}
