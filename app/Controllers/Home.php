<?php

namespace App\Controllers;
use App\Models\M_frontpage;

class Home extends BaseController
{
	public function __construct(){
		$this->m_frontpage = new M_frontpage();
	}

	public function index()
	{
		// hero & about
		$l_hero1 = $this->m_frontpage->getHomeHero()[0];
		$l_hero2 = $this->m_frontpage->getHomeHero()[1];

		// Do
		$l_do = $this->m_frontpage->getHomeDo()[0];
		$l_dc1 = $this->m_frontpage->getHomeDoCategories()[0];
		$l_dc2 = $this->m_frontpage->getHomeDoCategories()[1];
		$l_dc3 = $this->m_frontpage->getHomeDoCategories()[2];


		// about
		$l_about = $this->m_frontpage->getHomeAbout()[0];
		
		// services
		$l_services = $this->m_frontpage->getHomeServices()[0];
		$l_sc = $this->m_frontpage->getHomeServiceCategories();
		
		// Pricing
		$l_pricing = $this->m_frontpage->getHomePricing()[0];
		$l_popt1 = $this->m_frontpage->getHomePricingOpt()[0];
		$l_popt2 = $this->m_frontpage->getHomePricingOpt()[1];
		$l_pdetail1 = $this->m_frontpage->getHomePricingDetail()[0];
		$l_pdetail2 = $this->m_frontpage->getHomePricingDetail()[1];


		// Testimonials
		$l_testi = $this->m_frontpage->getHomeTestimonials()[0];
		$data = [
			'title_meta' => view('partials-front/title-meta', ['title' => 'Home']),

			// hero
			'hero1' => $l_hero1,
			'hero2' => $l_hero2,

			// do
			'l_do' => $l_do,
			'l_dc1' => $l_dc1,
			'l_dc2' => $l_dc2,
			'l_dc3' => $l_dc3,


			'l_about' => $l_about,
			'l_services' => $l_services,
			'l_sc' => $l_sc,
			'l_pricing' => $l_pricing,
			'l_popt1' => $l_popt1,
			'l_popt2' => $l_popt2,
			'l_pdetail1' => $l_pdetail1,
			'l_pdetail2' => $l_pdetail2,

			'l_testi' => $l_testi,

			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('index', $data);
		// return view('index');
	}

	public function contact()
	{
		$l_contact1 = $this->m_frontpage->getContact()[0];
		$l_contact2 = $this->m_frontpage->getContact()[1];

		$data = [
			'l_contact1' => $l_contact1,
			'l_contact2' => $l_contact2,
			'title_meta' => view('partials-front/title-meta', ['title' => 'Contact']),
			// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
		];
		return view('contact', $data);
		// return view('index');
	}

	// public function portofolio()
	// {
	// 	$data = [
	// 		'title_meta' => view('partials-front/title-meta', ['title' => 'Portofolio']),
	// 		// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
	// 	];
	// 	return view('portofolio', $data);
	// 	// return view('index');
	// }

	// public function portofolio_details()
	// {
	// 	$data = [
	// 		'title_meta' => view('partials-front/title-meta', ['title' => 'Portofolio Details']),
	// 		// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
	// 	];
	// 	return view('portofolio-details', $data);
	// 	// return view('index');
	// }

	// public function service()
	// {
	// 	$data = [
	// 		'title_meta' => view('partials-front/title-meta', ['title' => 'Service']),
	// 		// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
	// 	];
	// 	return view('service', $data);
	// 	// return view('index');
	// }

	// public function service_details()
	// {
	// 	$data = [
	// 		'title_meta' => view('partials-front/title-meta', ['title' => 'Service Details']),
	// 		// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
	// 	];
	// 	return view('service-details', $data);
	// 	// return view('index');
	// }

	// public function about()
	// {
	// 	$data = [
	// 		'title_meta' => view('partials-front/title-meta', ['title' => 'About']),
	// 		// 'page_title' => view('partials-front/page-title', ['title' => 'Nazox', 'pagetitle' => 'Dashboard'])
	// 	];
	// 	return view('about', $data);
	// 	// return view('index');
	// }
}