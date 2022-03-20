<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_pesanan;

	class Report extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_pesanan = new M_pesanan();
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
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$incomes = $this->m_pesanan->getTotalIncomes()[0]->incomes;
			$withdrawal = $this->m_pesanan->getTotalWithdrawal()[0]->withdrawal;
			$totalcsrate = $this->m_pesanan->getAllCsRating()[0]->csrate;
			$totaldesrate = $this->m_pesanan->getAllDesignerRating()[0]->desrate;
			$totalorder = $this->m_pesanan->countAllOrder()[0]->hitung;
			$closedorder = $this->m_pesanan->countAllClosedOrder()[0]->hitung;
			$canceledorder = $this->m_pesanan->countAllCanceledOrder()[0]->hitung;
			$top_cs = $this->m_pesanan->getTop10Cs();
			$top_designer = $this->m_pesanan->getTop10Designer();
			$all_income = $this->m_pesanan->getAllIncomes();

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Laporan Pendapatan dan Rating']),
				'pendapatan' => $incomes,
				'withdrawal' => $withdrawal,
				'cs_rate' => $totalcsrate,
				'des_rate' => $totaldesrate,
				'top_cs' => $top_cs,
				'top_designer' => $top_designer,
				'total_order' => $totalorder,
				'closed_order' => $closedorder,
				'canceled_order' => $canceledorder,
				'all_income' => $all_income,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/report/report-summary', $data);
		}
	}

?>