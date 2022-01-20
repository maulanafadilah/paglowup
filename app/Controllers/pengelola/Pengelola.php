<?php

namespace App\Controllers;

class Pengelola extends BaseController
{
	
	public function index()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Pengelola']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'PAGlowUP', 'li_2' => 'Dashboard'])
		];
		
		return view('/pengelola/index', $data);
	}

	public function user_pengelola()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'UserPengelola']),
			'page_title' => view('partials/page-title', ['title' => 'UserPengelola', 'li_1' => 'PAGlowUP', 'li_2' => 'User Pengelola'])
		];
		
		return view('/pengelola/pengelola-user-pengelola', $data);
	}

	public function user_customerservice()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'UserCS']),
			'page_title' => view('partials/page-title', ['title' => 'UserCS', 'li_1' => 'PAGlowUP', 'li_2' => 'User CS'])
		];
		
		return view('/pengelola/pengelola-user-customerservice', $data);
	}
	
	public function user_designer()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'UserDesigner']),
			'page_title' => view('partials/page-title', ['title' => 'UserDesigner', 'li_1' => 'PAGlowUP', 'li_2' => 'User Designer'])
		];
		
		return view('/pengelola/pengelola-user-designer', $data);
	}

	public function user_umkm()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'UserUMKM']),
			'page_title' => view('partials/page-title', ['title' => 'UserUMKM', 'li_1' => 'PAGlowUP', 'li_2' => 'User UMKM'])
		];
		
		return view('/pengelola/pengelola-user-umkm', $data);
	}

	public function transaction()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Transaction']),
			'page_title' => view('partials/page-title', ['title' => 'Transaction', 'li_1' => 'PAGlowUP', 'li_2' => 'Transaction'])
		];
		
		return view('/pengelola/pengelola-transaction', $data);
	}
	
	public function transaction_details()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'TransactionDetails']),
			'page_title' => view('partials/page-title', ['title' => 'TransactionDetails', 'li_1' => 'PAGlowUP', 'li_2' => 'Transaction Details'])
		];
		
		return view('/pengelola/pengelola-transaction-details', $data);
	}

	public function profile()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
			'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP', 'li_2' => 'Profile'])
		];
		
		return view('/pengelola/pengelola-profile', $data);
	}

	public function portofolio_designer()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'PortoDesigner']),
			'page_title' => view('partials/page-title', ['title' => 'PortoDesigner', 'li_1' => 'PAGlowUP', 'li_2' => 'Portofolio Designer'])
		];
		
		return view('/pengelola/pengelola-portofolio-designer', $data);
	}

	public function portofolio_designer_details()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'PAGlowUP', 'li_2' => 'Dashboard'])
		];
		
		return view('/pengelola/pengelola-portofolio-designer-details', $data);
	}

	public function withdrawal()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Withdrawal']),
			'page_title' => view('partials/page-title', ['title' => 'Withdrawal', 'li_1' => 'PAGlowUP', 'li_2' => 'Withdrawal'])
		];
		
		return view('/pengelola/pengelola-withdrawal', $data);
	}
	
	public function withdrawal_details()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Withdrawal']),
			'page_title' => view('partials/page-title', ['title' => 'Withdrawal', 'li_1' => 'PAGlowUP', 'li_2' => 'Withdrawal'])
		];
		
		return view('/pengelola/pengelola-withdrawal-details', $data);
	}

	public function frontpage_home()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'PAGlowUP', 'li_2' => 'Dashboard'])
		];
		
		return view('/pengelola/pengelola-frontpage-home', $data);
	}

	public function frontpage_about()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'PAGlowUP', 'li_2' => 'Dashboard'])
		];
		
		return view('/pengelola/pengelola-frontpage-about', $data);
	}

	public function frontpage_contact()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard'])
		];
		
		return view('/pengelola/pengelola-frontpage-contact', $data);
	}

}
