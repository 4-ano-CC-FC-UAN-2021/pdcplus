<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorizacao;

class FeedController extends Controller
{
    public function show()
    {
        return view('feed.inicial', [
            'autorizacoes' => Autorizacao::all()
        ]);
    }
}
