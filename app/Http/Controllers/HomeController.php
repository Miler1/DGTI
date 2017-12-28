<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use PDF;


class HomeController extends Controller

{

    public function flash()

    {

    	flashy()->success('You get success notification.', 'hdtuto.com');

		return view('flash');

    }

}