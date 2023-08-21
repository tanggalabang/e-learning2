<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function list()
  {
    $data['getRecord'] = User::getGuru();
    return view('admin.guru.list', $data);
  }

}
