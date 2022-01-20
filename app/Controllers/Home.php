<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Home']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('index', $data);
		// return view('index');
	}

	public function portofolio()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Portofolio']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('portofolio', $data);
		// return view('index');
	}

	public function portofolio_details()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Portofolio Details']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('portofolio-details', $data);
		// return view('index');
	}

	public function service()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Service']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('service', $data);
		// return view('index');
	}

	public function service_details()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Service Details']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('service-details', $data);
		// return view('index');
	}

	public function contact()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Contact']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('contact', $data);
		// return view('index');
	}

	public function about()
	{
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'About']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('about', $data);
		// return view('index');
	}
}