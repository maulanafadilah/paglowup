<?php

namespace App\Controllers\umkm;

class Umkm extends \App\Controllers\BaseController
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