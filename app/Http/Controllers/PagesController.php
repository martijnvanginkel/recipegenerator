<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex() {
		return view('pages.welcome');
	}

	public function getProfile() {
		return view('pages.profile');
	}

}
