<?php

namespace App\Controllers;

class Umkm extends BaseController
{
    public function index()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Pesanan']),
			'page_title' => view('partials/page-title', ['title' => 'Pesanan', 'li_1' => 'PAGlowUP', 'li_2' => 'Pesanan'])
		];
		
		return view('/umkm/umkm-pesanan', $data);
	}
}