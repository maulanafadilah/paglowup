<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_pesanan;
	use App\Models\M_designer;
	use App\Models\m_comment_csum;
	use App\Models\m_comment_csde;

	class Transaksi extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_pesanan = new M_pesanan();
			$this->m_designer = new M_designer();
			$this->m_comment_csde = new M_comment_csde();
			$this->m_comment_csum = new M_comment_csum();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/pengelola/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return view('pengelola/transaksi/list');
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			
			$l_pesanan = $this->m_pesanan->getAllOrder();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Transaksi']),
				'l_pesanan' => $l_pesanan,
				'detail_user' => $detilUser
			];
						
			return view('pengelola/transaksi/list-transaksi', $data);
		}

		public function detail($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');

			$l_detail = $this->m_pesanan->getOrderById($idorder)[0];
			$l_designer = $this->m_designer->getAllDesigner();
			$l_comments_csum = $this->m_comment_csum->getCommentsByIdOrder($idorder);
			$l_comments_csde = $this->m_comment_csde->getCommentsByIdOrder($idorder);
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail Transaksi']),
				'l_detail' => $l_detail,
				'l_designer' => $l_designer,
				'l_comments_csde' => $l_comments_csde,
				'l_comments_csum' => $l_comments_csum,
				'detail_user' => $detilUser
			];

			return view('pengelola/transaksi/detail-transaksi', $data);
		}
	}

?>