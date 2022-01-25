<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_designer extends Model	{
	 	protected $table      = 'tb_designer';
    protected $primaryKey = 'iddesigner';

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
    
    public function getAllDesigner(){
      $sql = "SELECT * FROM tb_user JOIN tb_designer USING (iduser)";
      return $this->db->query($sql)->getResult();
    }

    public function countDesignerByIdUser($iduser){
      $sql = "SELECT count(iddesigner) as hitung FROM tb_designer WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function getJoinUserDesigner($iduser){
      $sql = "SELECT * FROM tb_user JOIN tb_designer USING(iduser) WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function insertDesigner($data){
      $builder = $this->db->table('tb_designer');
      $builder->insert($data);
    }

    public function updateDesigner($dataset, $iduser){
      $builder = $this->db->table('tb_designer');
      $builder->where('iduser', $iduser);
      $builder->update($dataset);
    }

    public function getPortfolioById($id){
      $sql = "SELECT * FROM tb_portfolio WHERE idportfolio = $id";
      return $this->db->query($sql)->getResult();
    }

    public function getPortfolioByIdDesigner($iddesigner){
      $sql = "SELECT * FROM tb_portfolio WHERE iddesigner = $iddesigner";
      return $this->db->query($sql)->getResult();
    }

    public function insertPortfolio($dataset){
      $builder = $this->db->table('tb_portfolio');
      $builder->insert($dataset);
    }

    public function deletePortfolio($idportfolio){
      $builder = $this->db->table('tb_portfolio');
      $builder->where('idportfolio', $idportfolio);
      $builder->delete();
    }

	}

?>