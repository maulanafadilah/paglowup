<?php 
	namespace App\Models;

	use CodeIgniter\Model;

	class M_user extends Model	{
	 	protected $table      = 'tb_user';
    protected $primaryKey = 'iduser';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
 	
   	public function countUsername($username){
   		$db = db_connect();
   		$sql = "SELECT count(iduser) as hitung FROM tb_user WHERE username = '$username'";
   		$query = $this->db->query($sql);
   		return $query->getResult();
   	}

   	public function getUser($username){
   		$db = db_connect();
   		$query = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'");
   		return $query->getResult();
   	}

	}

?>