<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_user;

	class Profile extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

    	if ($is_new > 0){
    		echo "<script>alert('restricted'); window.location.href = '".base_url()."/pengelola/dashboard';</script>";
    		exit;
    	}
		}

		public function index(){
			$iduser = session()->get('iduser');
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('pengelola/prof/detail-profile', $data);
		}

		public function add(){
			$this->newUser();

			$iduser = session()->get('iduser');
			$detilUser = $this->m_user->getUserById($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('pengelola/prof/add-profile', $data);
		}

		public function update_proc($iduser){
			$iduser2 = session()->get('iduser');
			
			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('pengelola/dashboard'));
			}

			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$notelp = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];
			$email = $_POST['email'];
			$old_email = $_POST['old_email'];

			if ($email != $old_email) {
				$cekEmail = $this->m_user->cekEmailTerdaftar($email, $iduser)[0]->hitung;
				if ($cekEmail > 0) {
					$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Email telah terdaftar
					</div>';
					session()->setFlashdata('notif', $alert);
					return redirect()->to(base_url('pengelola/profile'));
				}
				$this->m_user->updateEmail($email, $iduser);
			}

			$dataset = [
				'name' => $nama,
				'address' => $alamat,
				'phone' => $notelp,
				'whatsapp' => $whatsapp
			];
			
			$this->m_pengelola->updatePengelola($dataset, $iduser);
			
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Profil berhasil diubah
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('pengelola/profile'));
		}

		public function create_proc($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('pengelola/dashboard'));
			}

			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$notelp = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];

			$dataset = [
				'name' => $nama,
				'address' => $alamat,
				'phone' => $notelp,
				'whatsapp' => $whatsapp,
				'iduser' => $iduser
			];

			$this->m_pengelola->insertPengelola($dataset);

			return redirect()->to(base_url('pengelola/dashboard'));
		}

		public function update_pass($iduser){
			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('pengelola/dashboard'));
			}

			$old_pass = md5($_POST['old_pass']);
			$new_pass = md5($_POST['new_pass']);
			$auth_pass = md5($_POST['auth_pass']);

			$db_pass = $this->m_user->getUserById($iduser)[0]->pass;

			if ($old_pass != $db_pass) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Password lama tidak sesuai
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/profile'));
			}

			if($new_pass != $auth_pass){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Ulang password baru salah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/profile'));	
			}

			$this->m_user->updatePassword($new_pass, $iduser);
			if ($old_pass != $db_pass) {
				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Password berhasil diubah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/profile'));
			}
		}
	}
?>