<?php namespace App\Controllers\cs;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_pesanan;

	class Dashboard extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_cs = new M_cs();
			$this->m_pesanan = new M_pesanan();
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
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

			$totalorder = $this->m_pesanan->countOrderByCs($detilUser->idcs)[0]->hitung;
			$canceledorder = $this->m_pesanan->countCancelOrderByCs($detilUser->idcs)[0]->hitung;
			$inworkorder = $this->m_pesanan->countPendingOrderByCs($detilUser->idcs)[0]->hitung;
			$previeworder = $this->m_pesanan->getOrderByCsLimit($detilUser->idcs);

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
				'detail_user' => $detilUser,
				'totalorder' => $totalorder,
				'canceledorder' => $canceledorder,
				'inworkorder' => $inworkorder,
				'previeworder' => $previeworder
			];
			
			return view('cs/dashboard', $data);
		}
	}

?>