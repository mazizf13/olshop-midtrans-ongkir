<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;

class Home extends Component
{
    public $products = [];

    // atribut filtering
    public $search,$min,$max;

    public function render()
    {
        // filter harga max
        if($this->max)
        {
            $harga_max = $this->max;
        } else {
            $harga_max = 999999999999;
        }

        // filter harga min
        if($this->min)
        {
            $harga_min = $this->min;
        } else {
            $harga_min = 0;
        }

        // filter search
        if($this->search)
        {
            $this->products = Produk::where('nama','like', '%'.$this->search.'%')
                ->where('harga', '>=', $harga_min)
                ->where('harga', '<=', $harga_max)
                ->get();
        } else {
            $this->products = Produk::where('harga', '>=', $harga_min)
                ->where('harga', '<=', $harga_max)
                ->get();;
        }

        return view('livewire.home')
            ->extends('layouts.app')
            ->section('content');
    }
}
