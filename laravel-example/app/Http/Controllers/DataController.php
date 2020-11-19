<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function open() {
        return response()->json(['msg' => 'this data is for all users'], 200);
    }

    public function closed() {
        return response()->json(['msg' => 'this data is for authanticated users only'], 200);
    }
}
