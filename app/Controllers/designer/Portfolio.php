<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_designer;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Portfolio extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_designer = new M_designer();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function index(){
			return redirect()->to(base_url('designer/portfolio/list'));
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_designer->countDesignerByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/designer/profile/add';</script>";
    		exit;
    	}
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];

			$dataset = $this->m_designer->getPortfolioByIdDesigner($detilUser->iddesigner);

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Portfolio']),
				'dataset' => $dataset,
				'detail_user' => $detilUser
			];
			
			return view('designer/port/list-portfolio', $data);
		}

		public function add_proc(){
			$this->newUser();

			define('MB', 1000000);
			if ($_FILES['foto']['size'] > 10*MB) { // JIKA FILE DI UPLOAD OLEH USER
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

			$iduser = session()->get('iduser');
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

			return redirect()->to(base_url('designer/portfolio/list'));
		}

		public function delete_proc($idportfolio){
			$this->newUser();

			$cekiduser = $this->m_user->getUserByPortfolio($idportfolio)[0]->iduser;
			$iduser = session()->get('iduser');

			if ($cekiduser != $iduser) {
  			echo "<script>alert('restricted'); window.location.href = '".base_url()."/designer/portfolio';</script>";
   			exit;
			}

			$img = $this->m_designer->getPortfolioById($idportfolio)[0]->img;

			if ($img != 'image.jpg') {
				unlink(ROOTPATH.'public/webdata/uploads/images/designer/portfolio/'.$img);
			}

			$this->m_designer->deletePortfolio($idportfolio);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				portfolio berhasil dihapus
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('designer/portfolio/list'));
		}

  public function upload_img(){
    	$img = $this->request->getFile('foto');
    	$newName = $img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/images/designer/portfolio/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

		public function list_img(){
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

		public function konfirDel(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$portfolio = $this->m_designer->getPortfolioById($id);
				foreach ($portfolio as $data) {
					echo '<a href="'.base_url().'/designer/portfolio/delete_proc/'.$data->idportfolio.'" class="btn btn-danger">
                    Hapus
                </a>';
				}
			}
		}
	}
?>