<?php

namespace App\Controllers;

class Designer extends BaseController
{
	
	public function index()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Portofolio']),
			'page_title' => view('partials/page-title', ['title' => 'Portofolio', 'li_1' => 'PAGlowUP', 'li_2' => 'Portofolio'])
		];
		
		return view('/designer/designer-portofolio', $data);
	}


	public function testimonials()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Testimoni']),
			'page_title' => view('partials/page-title', ['title' => 'Testimoni', 'li_1' => 'PAGlowUP', 'li_2' => 'Testimonial'])
		];
		
		return view('/designer/designer-testimonials', $data);
	}

	public function profile()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
			'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP', 'li_2' => 'Profile'])
		];
		
		return view('/designer/designer-profile', $data);
	}


	public function withdrawal()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Withdrawal']),
			'page_title' => view('partials/page-title', ['title' => 'Withdrawal', 'li_1' => 'PAGlowUP', 'li_2' => 'Withdrawal'])
		];
		
		return view('/designer/designer-withdrawal', $data);
	}
	
	public function withdrawal_details()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Withdrawal']),
			'page_title' => view('partials/page-title', ['title' => 'Withdrawal', 'li_1' => 'PAGlowUP', 'li_2' => 'Withdrawal'])
		];
		
		return view('/designer/designer-withdrawal-details', $data);
	}

	public function job_list()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Jobs']),
			'page_title' => view('partials/page-title', ['title' => 'Jobs', 'li_1' => 'PAGlowUP', 'li_2' => 'Jobs'])
		];
		
		return view('/designer/designer-job-list', $data);
	}

	public function chat_cs()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'DiskusiCS']),
			'page_title' => view('partials/page-title', ['title' => 'DiskusiCS', 'li_1' => 'PAGlowUP', 'li_2' => 'DiskusiCS'])
		];
		
		return view('/designer/designer-chat', $data);
	}

}
