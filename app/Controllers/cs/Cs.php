<?php

namespace App\Controllers;

class Cs extends BaseController
{
	
	public function index()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Pemesanan']),
			'page_title' => view('partials/page-title', ['title' => 'Pemesanan', 'li_1' => 'PAGlowUP', 'li_2' => 'Pemesanan'])
		];
		
		return view('/customerservice/cs-pemesanan-list', $data);
	}



	public function profile()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
			'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP', 'li_2' => 'Profile'])
		];
		
		return view('/customerservice/cs-profile', $data);
	}


	public function chat()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'DiskusiCS']),
			'page_title' => view('partials/page-title', ['title' => 'DiskusiCS', 'li_1' => 'PAGlowUP', 'li_2' => 'DiskusiCS'])
		];
		
		return view('/customerservice/cs-chat', $data);
	}

    public function designer_list()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'DesignerList']),
			'page_title' => view('partials/page-title', ['title' => 'DesignerList', 'li_1' => 'PAGlowUP', 'li_2' => 'DesignerList'])
		];
		
		return view('/customerservice/cs-designer-list', $data);
	}
}
