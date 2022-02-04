<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_user;
    use App\Models\M_frontpage;

	class Frontpage extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_pengelola = new M_pengelola();
            $this->m_frontpage = new M_frontpage();
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
			return redirect()->to(base_url('pengelola/frontpage/list'));
		}

		public function home(){
			$this->newUser();
	        $iduser = session()->get('iduser');
			$l_frontpage = $this->m_frontpage->getHomeFrontpage();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];


			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Frontpage Home']),
				'l_home' => $l_frontpage,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/frontpage/list-home', $data);
		}

		public function detail($idstatic){
			$this->newUser();
			$detilUser = $this->m_pengelola->getJoinUserPengelola(session()->get('iduser'))[0];
			$detail_frontpage = $this->m_frontpage->getDetailFrontpage($idstatic)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail Frontpage']),
				'detail_frontpage' => $detail_frontpage,
				'detail_user' => $detilUser
			];

			return view('pengelola/frontpage/detail-frontpage', $data);
		}

        public function edit($idstatic){
			$this->newUser();
			$detilUser = $this->m_pengelola->getJoinUserPengelola(session()->get('iduser'))[0];
			$detail_frontpage = $this->m_frontpage->getDetailFrontpage($idstatic)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Edit Frontpage']),
				'detail_frontpage' => $detail_frontpage,
				'detail_user' => $detilUser
			];

			return view('pengelola/frontpage/edit-frontpage', $data);
		}

        public function update_proc($idstatic){
			$this->newUser();

			$judul = $_POST['title'];
			$konten = $_POST['content'];
			$penanda = $_POST['tag'];
            $gmbr1 = $_POST['img1'];

            if (!$this->validate([
                $gmbr1 => [
                    'rules' => 'is_image[$gmbr1]|mime_in[$gmbr1, image/jpg, image/jpeg, image/png]',
                    'errors' => [
                        'max_size' => 'Size Gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar is_image',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
                
                // 'img2' => ['rules' => 'max_size[img2, 10240]|is_image[img2]|mime_in[img2, image/jpg, image/jpeg, image/png]'],
                // 'img3' => ['rules' => 'max_size[img3, 10240]|is_image[img3]|mime_in[img3, image/jpg, image/jpeg, image/png]'],
                // 'img4' => ['rules' => 'max_size[img4, 10240]|is_image[img4]|mime_in[img4, image/jpg, image/jpeg, image/png]'],
            ])){

                $validation = \Config\Services::validation();
                dd($validation);
                // return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic))->withInput();
            }

		}

        public function image_frontpage($idstatic){

        }

		public function add_proc(){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = md5($_POST['pass']);

			$cekUsername = $this->m_user->countUsername($username)[0]->hitung;
			$cekEmail = $this->m_user->countUserByEmail($email)[0]->hitung;

			if ($cekUsername != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Username telah terdaftar
					</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/pengelola/list'));
			}

			if ($cekEmail != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Email telah terdaftar
					</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/pengelola/list'));
			}

			$dataUser = [
				'username' => $username,
				'pass' => $password,
				'email' => $email,
				'flag' => 1,
				'idgroup' => 1
			];

			$this->m_user->insertUser($dataUser);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					User berhasil dibuat
				</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/pengelola/list'));
		}

		

		public function flag_switch($iduser){
			$flag = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->flag;

			if ($flag == 0) {
				$this->m_user->aktifkanUser($iduser);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					User Diaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);

			}elseif ($flag == 1) {
				$this->m_user->nonaktifkanUser($iduser);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					User Dinonaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);
			}
			
			return redirect()->to(base_url('pengelola/pengelola/detail/'.$iduser));
		}
	}

?>