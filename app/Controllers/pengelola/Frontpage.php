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

        public function contact(){
			$this->newUser();
	        $iduser = session()->get('iduser');
			$l_frontpage = $this->m_frontpage->getContactFrontpage();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];


			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Frontpage Home']),
				'l_contact' => $l_frontpage,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/frontpage/list-contact', $data);
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

            
			define('MB', 1000000);

            // image1
			if ($_FILES['img1']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
			}
			elseif ($_FILES['img1']['size'] != 0) {
				$old_img = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img1;
				if ($old_img !== NULL) {
					unlink(ROOTPATH.'public/webdata/uploads/images/frontpage/'.$old_img);
				}
				$img_path1 = $this->upload_img()['name'];
			}
			else{
				$img_path1 = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img1;
			}

            // image2
			if ($_FILES['img2']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
			}
			elseif ($_FILES['img2']['size'] != 0) {
				$old_img = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img2;
				if ($old_img !== NULL) {
					unlink(ROOTPATH.'public/webdata/uploads/images/frontpage/'.$old_img);
				}
				$img_path2 = $this->upload_img2()['name'];
			}
			else{
				$img_path2 = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img2;
			}

            // image3
			if ($_FILES['img3']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
			}
			elseif ($_FILES['img3']['size'] != 0) {
				$old_img = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img3;
				if ($old_img !== NULL) {
					unlink(ROOTPATH.'public/webdata/uploads/images/frontpage/'.$old_img);
				}
				$img_path3 = $this->upload_img3()['name'];
			}
			else{
				$img_path3 = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img3;
			}

            // image4
			if ($_FILES['img4']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
			}
			elseif ($_FILES['img4']['size'] != 0) {
				$old_img = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img4;
				if ($old_img !== NULL) {
					unlink(ROOTPATH.'public/webdata/uploads/images/frontpage/'.$old_img);
				}
				$img_path4 = $this->upload_img4()['name'];
			}
			else{
				$img_path4 = $this->m_frontpage->getDetailFrontpage($idstatic)[0]->img4;
			}


            // mengambil variable
			$judul = $_POST['title'];
			$konten = $_POST['content'];
			$penanda = $_POST['tag'];

			
            // mengumpulkan dataset
			$dataset = [
				'title' => $judul,
				'content' => $konten,
				'tag' => $penanda,
				'img1' => $img_path1,
                'img2' => $img_path2,
                'img3' => $img_path3,
                'img4' => $img_path4,
			];
			
			$this->m_frontpage->updateFrontpage($dataset, $idstatic);
			
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Frontpage berhasil diubah
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('pengelola/frontpage/detail/'.$idstatic));
		}

        public function upload_img(){

            $idstatic = ('idstatic');
            $validationRule = [
              'img1' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img1]'
                  . '|is_image[img1]'
                  . '|mime_in[img1,image/jpg,image/jpeg,image/png,image/webp]'
                  . '|max_size[img1,4000]',
              ],
            ];
      
            if (! $this->validate($validationRule)) {
              $data = $this->validator->getErrors();
                      
              print_r($data);
                      $alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
                          Gambar yang anda upload tidak sesuai
                      </div>';
                      session()->setFlashdata('notif', $alert);
      
                      return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
            }else{
                $img = $this->request->getFile('img1');
                $newName = $img->getRandomName();
      
                $img->move(ROOTPATH.'public/webdata/uploads/images/frontpage/', $newName);
                $data = [
                    'name' => $img->getName(),
                    'type' => $img->getClientMimeType()
                ];
      
                return $data;
            }
        }	
        
        public function upload_img2(){

            $idstatic = ('idstatic');
            $validationRule = [
              'img2' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img2]'
                  . '|is_image[img2]'
                  . '|mime_in[img2,image/jpg,image/jpeg,image/png,image/webp]'
                  . '|max_size[img2,4000]',
              ],
            ];
      
            if (! $this->validate($validationRule)) {
              $data = $this->validator->getErrors();
                      
              print_r($data);
                      $alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
                          Gambar yang anda upload tidak sesuai
                      </div>';
                      session()->setFlashdata('notif', $alert);
      
                      return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
            }else{
                $img = $this->request->getFile('img2');
                $newName = $img->getRandomName();
      
                $img->move(ROOTPATH.'public/webdata/uploads/images/frontpage/', $newName);
                $data = [
                    'name' => $img->getName(),
                    'type' => $img->getClientMimeType()
                ];
      
                return $data;
            }
        }
        
        public function upload_img3(){

            $idstatic = ('idstatic');
            $validationRule = [
              'img3' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img3]'
                  . '|is_image[img3]'
                  . '|mime_in[img3,image/jpg,image/jpeg,image/png,image/webp]'
                  . '|max_size[img3,4000]',
              ],
            ];
      
            if (! $this->validate($validationRule)) {
              $data = $this->validator->getErrors();
                      
              print_r($data);
                      $alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
                          Gambar yang anda upload tidak sesuai
                      </div>';
                      session()->setFlashdata('notif', $alert);
      
                      return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
            }else{
                $img = $this->request->getFile('img3');
                $newName = $img->getRandomName();
      
                $img->move(ROOTPATH.'public/webdata/uploads/images/frontpage/', $newName);
                $data = [
                    'name' => $img->getName(),
                    'type' => $img->getClientMimeType()
                ];
      
                return $data;
            }
        }

        public function upload_img4(){

            $idstatic = ('idstatic');
            $validationRule = [
              'img4' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img4]'
                  . '|is_image[img4]'
                  . '|mime_in[img4,image/jpg,image/jpeg,image/png,image/webp]'
                  . '|max_size[img4,4000]',
              ],
            ];
      
            if (! $this->validate($validationRule)) {
              $data = $this->validator->getErrors();
                      
              print_r($data);
                      $alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
                          Gambar yang anda upload tidak sesuai
                      </div>';
                      session()->setFlashdata('notif', $alert);
      
                      return redirect()->to(base_url('pengelola/frontpage/edit/'.$idstatic));
            }else{
                $img = $this->request->getFile('img4');
                $newName = $img->getRandomName();
      
                $img->move(ROOTPATH.'public/webdata/uploads/images/frontpage/', $newName);
                $data = [
                    'name' => $img->getName(),
                    'type' => $img->getClientMimeType()
                ];
      
                return $data;
            }
        }
	}

?>