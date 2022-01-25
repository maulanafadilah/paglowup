<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_cs extends Model	{
	 	protected $table      = 'tb_cs';
    protected $primaryKey = 'idcs';

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

    function __construct(){
      $this->db = db_connect();
    }
    
    public function getAllCs(){
      $sql = "SELECT * FROM tb_user JOIN tb_cs USING (iduser)";
      return $this->db->query($sql)->getResult();
    }

    public function countCsByIdUser($iduser){
      $sql = "SELECT count(idcs) as hitung FROM tb_cs WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function getJoinUserCs($iduser){
      $sql = "SELECT * FROM tb_user JOIN tb_cs USING(iduser) WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function insertCs($data){
      $builder = $this->db->table('tb_cs');
      $builder->insert($data);
    }

    public function updateCs($dataset, $iduser){
      $builder = $this->db->table('tb_cs');
      $builder->where('iduser', $iduser);
      $builder->update($dataset);
    }
	}

?>