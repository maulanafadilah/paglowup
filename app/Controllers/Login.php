<?php 
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	use App\Models\M_user;
	use App\Models\M_pesanan;

	class login extends BaseController{

		function __construct(){
			$this->m_pesanan = new M_pesanan();
			$this->m_user = new M_user();
		}

		public function index(){
			$l_rtesti2 = $this->m_pesanan->getTestimonial();
			
			$data = [
				// 'l_rtesti' => $l_rtesti,
				'l_rtesti2' => $l_rtesti2,
				'title_meta' => view('partials/title-meta', ['title' => 'Login | PAGlowUP'])
			];
			return view('auth-login', $data);
		}

		public function login_proc(){
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$status = $this->m_user->countUsername($username)[0]->hitung;

			if ($status != 0){
				$user = $this->m_user->getUser($username)[0];
				if ($password == $user->pass) {
					if($user->flag == 0){
						$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
												Akun ini sudah tidak aktif
											</div>';
						session()->setFlashdata('notif_login', $alert);
						session()->setFlashdata('s_username', $username);
						return redirect()->to(base_url('login'));
					}else{
						$userdata = [
							'iduser' => $user->iduser,
							'username' => $user->username,
							'flag' => $user->flag,
							'idgroup' => $user->idgroup,
							'logged_in' => TRUE
						];
						session()->set($userdata);
						
						if($user->idgroup == 1){
							return redirect()->to(base_url('pengelola/dashboard'));
						}
						elseif($user->idgroup == 2){
							return redirect()->to(base_url('cs/dashboard'));
						}
						elseif($user->idgroup == 3){
							return redirect()->to(base_url('designer/dashboard'));
						}
						elseif($user->idgroup == 4){
							return redirect()->to(base_url('umkm/dashboard'));
						}
					}

				}else{
					$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
											Password salah
										</div>';
					session()->setFlashdata('notif_login', $alert);
					session()->setFlashdata('s_username', $username);
					return redirect()->to(base_url('login'));
				}
			}else{
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
										User Tidak Ada
									</div>';
				session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				return redirect()->to(base_url('login'));
			}
		}

		public function logout(){
			session_destroy();
			return redirect()->to(base_url('login'));
		}

		public function recover(){
			$l_rtesti2 = $this->m_pesanan->getTestimonial();
			
			$data = [
				// 'l_rtesti' => $l_rtesti,
				'l_rtesti2' => $l_rtesti2,
				'title_meta' => view('partials/title-meta', ['title' => 'Reset Password | PAGlowUP'])
			];
			return view('auth-recoverpw', $data);
		}

		public function recov_proc(){
			$username = $_POST['username'];
			$email = $_POST['email'];

			$cek = $this->m_user->recoveryUserEmail($username, $email)[0]->hitung;

			if ($cek == 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
										Username dan email tidak cocok
									</div>';
				session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				session()->setFlashdata('s_email', $email);
				return redirect()->to(base_url('login/recover'));
			}

			$pass1 = md5($_POST['pass1']);
			$pass2 = md5($_POST['pass2']);

			if ($pass1 != $pass2) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
										konfirmasi password tidak cocok
									</div>';
				session()->setFlashdata('notif_login', $alert);
				session()->setFlashdata('s_username', $username);
				session()->setFlashdata('s_email', $email);
				return redirect()->to(base_url('login/recover'));
			}

			$this->m_user->recoveryPassword($pass1, $username, $email);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
									Password berhasil direset, silahkan untuk login kembali
								</div>';
			session()->setFlashdata('notif_login', $alert);
			return redirect()->to(base_url('login/recover'));
		}
	}

?>