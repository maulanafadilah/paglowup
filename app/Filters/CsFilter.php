<?php namespace App\Filters;

	use CodeIgniter\HTTP\RequestInterface;
	use CodeIgniter\HTTP\ResponseInterface;
	use CodeIgniter\Filters\FilterInterface;

	class CsFilter implements FilterInterface{
	 
	  public function before(RequestInterface $request, $arguments = null){
	    if(! session()->get('logged_in')){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Session habis
				</div>';
				session()->setFlashdata('notif_login', $alert);
				return redirect()->to(base_url('login'));
	    }else{
	    	$flag = session()->get('flag');
	    	$idgroup = session()->get('idgroup');

	    	if ($flag == 0) {
					$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
											Akun ini sudah tidak aktif
										</div>';
					session()->setFlashdata('notif_login', $alert);
					session()->setFlashdata('s_username', $username);
					return redirect()->to(base_url('login'));
	    	}

	    	if ($idgroup == 1) {
	    		return redirect()->to(base_url('pengelola/dashboard'));
	    	}

	    	if ($idgroup == 3) {
	    		return redirect()->to(base_url('designer/dashboard'));
	    	}

	    	if ($idgroup == 4) {
	    		return redirect()->to(base_url('umkm/dashboard'));
	    	}
	    }
	  }

	  //--------------------------------------------------------------------

	  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	  {
	      
	  }
	}

?>