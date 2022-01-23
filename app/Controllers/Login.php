<?php 
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	use App\Models\M_user;

	class login extends BaseController{

		public function index(){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Login | PAGlowUP'])
			];
			return view('auth-login', $data);
		}

		public function login_proc(){

			$m_user = new M_user();

			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$status = $m_user->countUsername($username)[0]->hitung;

			if ($status != 0){
				$user = $m_user->getUser($username)[0];
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
	}

?>