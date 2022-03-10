<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
  public function index()
    {
		$metaInfo= [
					'title'=>'PetParent home page',
					'description'=>'Meta descrption'
				];

		return view('frontend.home', compact('metaInfo'));

    }
}
