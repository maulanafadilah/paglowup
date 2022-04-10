<?php 
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	use App\Models\M_user;
	use App\Models\M_pesanan;

	class register extends BaseController{

		function __construct(){
			$this->m_user = new M_user();
		}

		public function index(){
			$this->m_pesanan = new M_pesanan();
			$l_rtesti2 = $this->m_pesanan->getTestimonial();
			$data = [
				'l_rtesti2' => $l_rtesti2,
				'title_meta' => view('partials/title-meta', ['title' => 'Register | PAGlowUP'])
			];
			return view('auth-register', $data);
		}

		public function reg_proc(){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$idgroup = $_POST['idgroup'];

			$cekUsername = $this->m_user->countUsername($username)[0]->hitung;
			$cekEmail = $this->m_user->countUserByEmail($email)[0]->hitung;

			if ($idgroup == 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Mohon pilih tipe user terlebih dahulu
					</div>';
				session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				session()->setFlashdata('s_email', $email);
				return redirect()->to(base_url('register'));
			}

			if ($cekUsername != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Username telah terdaftar
					</div>';
				session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				session()->setFlashdata('s_email', $email);
				return redirect()->to(base_url('register'));
			}

			if ($cekEmail != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Email telah terdaftar
					</div>';
				session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				session()->setFlashdata('s_email', $email);
				return redirect()->to(base_url('register'));
			}

			$dataUser = [
				'username' => $username,
				'pass' => $password,
				'email' => $email,
				'flag' => 1,
				'idgroup' => $idgroup
			];

			$this->m_user->insertUser($dataUser);

  		echo "<script>alert('user berhasil dibuat, silahkan login untuk melanjutkan'); 
  			window.location.href = '".base_url()."/login';</script>";
  		// exit;
		}
	}

?>