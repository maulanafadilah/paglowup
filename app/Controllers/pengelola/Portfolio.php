<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_designer;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Portfolio extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_designer = new M_designer();
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function index(){
			return redirect()->to(base_url('pengelola/designer/list'));
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/pengelola/profile/add';</script>";
    		exit;
    	}
		}

		public function add_proc($iduser){
			$this->newUser();

			define('MB', 1048576);
			if ($_FILES['foto']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('designer/portfolio/list'));
			}
			elseif ($_FILES['foto']['size'] != 0) {
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = 'image.jpg';
			}

			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$description = $_POST['description'];
			$url = $_POST['url'];

			$dataset = [
				'description' => $description,
				'url' => $url,
				'img' => $img_path,
				'iddesigner' => $iddesigner
			];
			
			$this->m_designer->insertPortfolio($dataset);
			
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				portfolio berhasil ditambah
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('pengelola/designer/detail/'.$iduser));
		}

		public function delete_proc($idportfolio){
			$this->newUser();

			$img = $this->m_designer->getPortfolioById($idportfolio)[0]->img;
			$iddesigner = $this->m_designer->getPortfolioById($idportfolio)[0]->iddesigner;
			$iduser = $this->m_designer->getDesignerById($iddesigner)[0]->iduser;

			if ($img != 'image.jpg') {
				unlink(ROOTPATH.'public/webdata/uploads/images/designer/portfolio/'.$img);
			}

			$this->m_designer->deletePortfolio($idportfolio);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				portfolio berhasil dihapus
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('pengelola/designer/detail/'.$iduser));
		}

    public function upload_img(){
      $validationRule = [
        'foto' => [
          'label' => 'Image File',
          'rules' => 'uploaded[foto]'
            . '|is_image[foto]'
            . '|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[foto,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('pengelola/designer/list'));
      }else{
      	$img = $this->request->getFile('foto');
      	$newName = $img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/designer/portfolio/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

		public function list_portfolio(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$portfolio = $this->m_designer->getPortfolioById($id);
				foreach ($portfolio as $data) {
					echo '<table class="table">
					<tr>
						<td></td>
						<td class="text-center text-uppercase"><b>' . $data->description . '</b></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3"><img src="'.base_url().'/webdata/uploads/images/designer/portfolio/'.$data->img.'" class="rounded mx-auto d-block" style="max-height: 90%; max-width: 90%;"></td>
					</tr>
					</table>';
				}
			}
		}

		public function accDelPortfolio(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$portfolio = $this->m_designer->getPortfolioById($id);
				foreach ($portfolio as $data) {
					echo '<a href="'.base_url().'/pengelola/portfolio/delete_proc/'.$data->idportfolio.'" class="btn btn-danger">
                    Hapus
                </a>';
				}
			}
		}
	}
?>