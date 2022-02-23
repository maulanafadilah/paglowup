<?php namespace App\Controllers\umkm;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_umkm;
	use App\Models\M_bank;
	use App\Models\M_pesanan;
	use App\Models\M_comment_csum;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Pesanan extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_bank = new M_bank();
			$this->m_user = new M_user();
			$this->m_comment_csum = new M_comment_csum();
			$this->m_pesanan = new M_pesanan();
			$this->request = \Config\Services::request();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_umkm->countUmkmByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/umkm/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('umkm/pesanan/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

			$l_pesanan = $this->m_pesanan->getOrderByIdUmkm($idumkm);
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Pemesanan']),
				'l_pesanan' => $l_pesanan,
				'detail_user' => $detilUser
			];
			
			return view('umkm/pesanan/list-pesanan', $data);
		}

		public function detail($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
			$cek_id = $this->m_pesanan->getOrderById($idorder)[0]->idumkm;

			if ($idumkm != $cek_id) {
				return redirect()->to(base_url('umkm/pesanan/list'));
			}

			$l_detail = $this->m_pesanan->getOrderById($idorder)[0];
			$l_comments_csum = $this->m_comment_csum->getCommentsByIdOrder($idorder);
			$l_info_bank = $this->m_bank->getAllActiveBank();
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail Pemesanan']),
				'l_detail' => $l_detail,
				'l_comments_csum' => $l_comments_csum,
				'l_info_bank' => $l_info_bank,
				'detail_user' => $detilUser
			];

			return view('umkm/pesanan/detail-pesanan', $data);
		}

		public function add(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];
			$l_jenis_pesanan = $this->m_pesanan->getGroupOrder();
			$l_kat_pesanan = $this->m_pesanan->getProdCat();

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Tambah Pesanan Baru']),
				'l_jenis_pesanan' => $l_jenis_pesanan,
				'l_kat_pesanan' => $l_kat_pesanan,
				'detail_user' => $detilUser
			];
			
			return view('umkm/pesanan/add-pesanan', $data);
		}

		public function create_proc(){
			$iduser = session()->get('iduser');
			$v_foto = FALSE;

			$idgrouporder = $_POST['idgrouporder'];
			$idprodcat = $_POST['idprodcat'];
			$description = $_POST['description'];
			$date = date('Y-m-d h:i:s');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
			$price = $this->m_pesanan->getPriceByIdgrouporder($idgrouporder)[0]->price;

			$dataset = [
				'idgrouporder' => $idgrouporder,
				'idprodcat' => $idprodcat,
				'description' => $description,
				'orderdate' => $date,
				'idumkm' => $idumkm,
				'idstatus' => 1
			];
			
			if (!empty($_POST['discountcode'])) {
				$cek_kode = $this->m_pesanan->countDiscountByCode($_POST['discountcode'])[0]->hitung;
				$flag = $this->m_pesanan->getDiscountByCode($_POST['discountcode'])[0]->flag;
				if ($cek_kode != 0 && $flag == 1) {
					$iddiscount = $this->m_pesanan->getDiscountByCode($_POST['discountcode'])[0]->iddiscount;
					$discountamount = $this->m_pesanan->getDiscountByCode($_POST['discountcode'])[0]->discountamount;
					$totalpayment = round($price - ($price*($discountamount/100)));
					$dataset += [
						'iddiscount' => $iddiscount,
						'totalpayment' => $totalpayment
					];
				}else{
					$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Kode diskon tidak terdaftar / expired
					</div>';
					
					$data_session = [
						'alert' => $alert,
						'idgrouporder' => $idgrouporder,
						'idprodcat' => $idprodcat,
						'description' => $description
					];

					session()->setFlashdata($data_session);
				}
			}else{
				$dataset += ['totalpayment' => $price];
			}

			define('MB', 1048576);
			if ($_FILES['foto1']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['foto1']['size'] != 0) {
				$file1 = $this->upload_img1()['name'];
				$dataset += ['file1' => $file1];
			}

			if ($_FILES['foto2']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['foto2']['size'] != 0) {
				$file2 = $this->upload_img2()['name'];
				$dataset += ['file2' => $file2];
			}

			if ($_FILES['foto3']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['foto3']['size'] != 0) {
				$file3 = $this->upload_img3()['name'];
				$dataset += ['file3' => $file3];
			}		

			if ($_FILES['foto4']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['foto4']['size'] != 0) {
				$file4 = $this->upload_img4()['name'];
				$dataset += ['file4' => $file4];
			}

			if ($v_foto){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				$data_session = [
					'alert' => $alert,
					'idgrouporder' => $idgrouporder,
					'idprodcat' => $idprodcat,
					'description' => $description
				];

				session()->setFlashdata($data_session);
				return redirect()->to(base_url('umkm/pesanan/add'));
			}

			$this->m_pesanan->insertOrder($dataset);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Pesanan Berhasil Dibuat
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('umkm/pesanan/list'));
		}

		public function upload_payment($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');

			$dataset = $this->m_pesanan->getOrderById($idorder)[0];

			define('MB', 1048576);
			if ($_FILES['paymentproof']['size'] > 4*MB) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';

				session()->setFlashdata($alert);
				return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder));
			}
			elseif ($_FILES['paymentproof']['size'] != 0) {
				$paymentproof = $this->upload_img_payment($dataset)['name'];
			}

			$this->m_pesanan->uploadPaymentProof($paymentproof, $idorder);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				BUkti pembayaran berhasil di upload
			</div>';

			session()->setFlashdata($alert);
			return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder));
		}

		public function cancel_order($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			
			$this->m_pesanan->cancelOrderById($idorder, $idcs);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Pesanan berhasil dibatalkan
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder));
		}

		public function send_comment_csum($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');

			$dataset = [
				'idumkm' => $idumkm,
				'idorder' => $idorder,
				'comment' => $comment,
				'commenttime' => $commenttime
			];
			
			$this->m_comment_csum->sendComment($dataset);
			return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder.'#chat'));
		}

		public function send_comment_csum_img($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');

			$dataset = [
				'idumkm' => $idumkm,
				'idorder' => $idorder,
				'comment' => $comment,
				'commenttime' => $commenttime
			];

			define('MB', 1048576);
			if ($_FILES['file1']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['file1']['size'] != 0) {
				$file1 = $this->upload_file1($dataset)['name'];
				$dataset += ['file1' => $file1];
			}

			if ($_FILES['file2']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['file2']['size'] != 0) {
				$file2 = $this->upload_file2($dataset)['name'];
				$dataset += ['file2' => $file2];
			}

			if ($v_foto){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				$data_session = [
					'alert' => $alert
				];

				session()->setFlashdata($data_session);
				return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder.'?t=2'));
			}

			$this->m_comment_csum->sendComment($dataset);
			return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder.'#chat'));
		}

		public function send_review($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idumkm = $this->m_umkm->getJoinUserUmkm($iduser)[0]->idumkm;

			$designerrating = $_POST['designerrating'];
			$reviewdesigner = $_POST['reviewdesigner'];
			$csrating = $_POST['csrating'];
			$reviewcs = $_POST['reviewcs'];


			$dataset = [
				'designerrating' => $designerrating,
				'reviewdesigner' => $reviewdesigner,
				'csrating' => $csrating,
				'reviewcs' => $reviewcs,
				'idstatus' => 8
			];

			$amount = $this->m_pesanan->getOrderById($idorder)[0]->price;
			$iddesigner = $this->m_pesanan->getOrderById($idorder)[0]->iddesigner;

			$deposit = [
				'amount' => $amount,
				'iddesigner' => $iddesigner,
				'idorder' => $idorder,
				'dateincome' => date('Y-m-d')
			];

			$this->m_pesanan->addDepositDesigner($deposit);
			$this->m_pesanan->sendReviewByUmkm($dataset, $idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Berhasil Review, anda bisa mengunduh desain HD
			</div>';

			session()->setFlashdata($alert);
			return redirect()->to(base_url('umkm/pesanan/detail/'.$idorder.'?t=2'));
		}

    public function upload_img1(){
      $validationRule = [
        'foto1' => [
          'label' => 'Image File',
          'rules' => 'uploaded[foto1]'
            . '|is_image[foto1]'
            . '|mime_in[foto1,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[foto1,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/add'));
      }else{
      	$img = $this->request->getFile('foto1');
      	$newName = 'file1_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/umkm/orders/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_img2(){
      $validationRule = [
        'foto2' => [
          'label' => 'Image File',
          'rules' => 'uploaded[foto2]'
            . '|is_image[foto2]'
            . '|mime_in[foto2,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[foto2,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/add'));
      }else{
      	$img = $this->request->getFile('foto2');
      	$newName = 'file2_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/umkm/orders/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_img3(){
      $validationRule = [
        'foto3' => [
          'label' => 'Image File',
          'rules' => 'uploaded[foto3]'
            . '|is_image[foto3]'
            . '|mime_in[foto3,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[foto3,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/add'));
      }else{
      	$img = $this->request->getFile('foto3');
      	$newName = 'file3_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/umkm/orders/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_img4(){
      $validationRule = [
        'foto4' => [
          'label' => 'Image File',
          'rules' => 'uploaded[foto4]'
            . '|is_image[foto4]'
            . '|mime_in[foto4,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[foto4,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/add'));
      }else{
      	$img = $this->request->getFile('foto4');
      	$newName = 'file4_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/umkm/orders/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_file1($dataset){
      $validationRule = [
        'file1' => [
          'label' => 'Image File',
          'rules' => 'uploaded[file1]'
            . '|is_image[file1]'
            . '|mime_in[file1,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[file1,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Format file salah
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/detail/'.$dataset['idorder'].'?t=2'));
      }else{
      	$img = $this->request->getFile('file1');
      	$newName = 'file1_'.'_'.$dataset['idcs'].$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/comment/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_file2($dataset){
      $validationRule = [
        'file2' => [
          'label' => 'Image File',
          'rules' => 'uploaded[file2]'
            . '|is_image[file2]'
            . '|mime_in[file2,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[file2,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Format file salah
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/detail/'.$dataset['idorder'].'?t=2'));
      }else{
      	$img = $this->request->getFile('file2');
      	$newName = 'file2_'.'_'.$dataset['idcs'].$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/comment/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_img_payment($dataset){
    	$invoiceNo = $dataset->idprodcat.$dataset->idgrouporder.$dataset->idorder.$dataset->idumkm;
      $validationRule = [
        'paymentproof' => [
          'label' => 'Image File',
          'rules' => 'uploaded[paymentproof]'
            . '|is_image[paymentproof]'
            . '|mime_in[paymentproof,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[paymentproof,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/pesanan/detail/'.$dataset->idorder));
      }else{
      	$img = $this->request->getFile('paymentproof');
      	$newName = 'paypr'.$invoiceNo.'_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/umkm/paypr/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }
	}
?>