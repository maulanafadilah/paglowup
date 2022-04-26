<?php namespace App\Controllers\cs;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_designer;
	use App\Models\M_pesanan;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Designer extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_user = new M_user();
			$this->m_cs = new M_cs();
			$this->m_designer = new M_designer();
			$this->m_pesanan = new M_pesanan();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_cs->countCsByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/cs/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('cs/designer/list'));
		}

		public function list(){
			$this->newUser();

	    $iduser = session()->get('iduser');
			$l_designer = $this->m_designer->getAllActiveDesigner();
			$detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Designer']),
				'l_designer' => $l_designer,
				'detail_user' => $detilUser
			];
			
			return view('cs/user/list-designer', $data);
		}

		public function rdr_detail($iddesigner){
			$iduser = $this->m_designer->getDesignerById($iddesigner)[0]->iduser;
			return redirect()->to(base_url('cs/designer/detail/'.$iduser));
		}

		public function detail($iduser){
			$this->newUser();
			$detilUser = $this->m_cs->getJoinUserCs(session()->get('iduser'))[0];
			
			$detail_designer = $this->m_designer->getJoinUserDesigner($iduser)[0];
			$l_pesanan = $this->m_pesanan->getOrderByDesigner($detail_designer->iddesigner);
			$l_portfolio = $this->m_designer->getPortfolioByIdDesigner($detail_designer->iddesigner);
			$rating = $this->m_designer->getRatingDesignerById($detail_designer->iddesigner)[0]->rating;

			$l_works = $this->m_designer->getWorksByDesigner($detail_designer->iddesigner);

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail Designer']),
				'detail_designer' => $detail_designer,
				'detail_user' => $detilUser,
				'rating' => $rating,
				'l_pesanan' => $l_pesanan,
				'l_portfolio' => $l_portfolio,
				'l_works' => $l_works
			];

			return view('cs/user/detail-designer', $data);
		}
	}
?>