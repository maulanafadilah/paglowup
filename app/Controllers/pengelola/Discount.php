<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_discount;
	use App\Models\M_user;

	class Discount extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_discount = new M_discount();
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
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
			return redirect()->to(base_url('pengelola/discount/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$l_discount = $this->m_discount->getAllDiscount();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Customer Service']),
				'l_discount' => $l_discount,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/list-discount', $data);
		}

		public function add_proc(){
			$discountcode = $_POST['discountcode'];
			$discountamount = $_POST['discountamount'];

			$cekdiscountcode = $this->m_discount->countDiscountByCode($discountcode)[0]->hitung;

			if ($cekdiscountcode != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Kode diskon telah terdaftar
					</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/discount/list'));
			}
			$dataset = [
				'discountcode' => $discountcode,
				'discountamount' => $discountamount,
				'flag' => 1,
			];

			$this->m_discount->insertDiscount($dataset);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Kode diskon berhasil dibuat
				</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/discount/list'));
		}

		public function flag_switch($iddiscount){
			$flag = $this->m_discount->getDiscountById($iddiscount)[0]->flag;

			if ($flag == 0) {
				$this->m_discount->aktifkanDiskon($iddiscount);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Kode Diskon Diaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);

			}elseif ($flag == 1) {
				$this->m_discount->nonaktifkanDiskon($iddiscount);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Kode Diskon Dinonaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);
			}
			
			return redirect()->to(base_url('pengelola/discount/list'));
		}
	}

?>