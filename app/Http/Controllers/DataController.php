<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function uploadFile(Request $request)
    {
	return $request->hasFile('photos')? 't': 'f';
    }
}
