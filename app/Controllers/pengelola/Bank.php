<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_bank;
	use App\Models\M_user;

	class Bank extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_bank = new M_bank();
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
			return redirect()->to(base_url('pengelola/bank/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$l_bank = $this->m_bank->getAllBank();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Bank']),
				'l_bank' => $l_bank,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/list-bank', $data);
		}



		public function add_proc(){
			$bankname = $_POST['bankname'];
			$bankaccname = $_POST['bankaccname'];
			$bankaccnumber = $_POST['bankaccnumber'];

			$ceknorek = $this->m_bank->countBankByRek($bankaccnumber)[0]->hitung;

			if ($ceknorek != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Info bank telah terdaftar
					</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/bank/list'));
			}
			$dataset = [
				'bankname' => $bankname,
				'bankaccname' => $bankaccname,
				'bankaccnumber' => $bankaccnumber,
				'flag' => 1,
			];

			$this->m_bank->insertBank($dataset);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Informasi bank berhasil ditambahkan
				</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/bank/list'));
		}

		public function flag_switch($idbank){
			$flag = $this->m_bank->getBankById($idbank)[0]->flag;

			if ($flag == 0) {
				$this->m_bank->aktifkanBank($idbank);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Info Bank Diaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);

			}elseif ($flag == 1) {
				$this->m_bank->nonaktifkanBank($idbank);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Info Bank Dinonaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);
			}
			
			return redirect()->to(base_url('pengelola/bank/list'));
		}
	}
?>