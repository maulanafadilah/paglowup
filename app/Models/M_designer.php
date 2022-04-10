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

    public function getAllActiveDesigner(){
      $sql = "SELECT * FROM tb_user JOIN tb_designer USING (iduser) WHERE tb_user.flag = 1";
      return $this->db->query($sql)->getResult();
    }

    public function getRatingDesignerById($iddesigner){
      $sql = "SELECT ROUND(AVG(tb_order.designerrating)) AS rating 
        FROM tb_designer JOIN tb_order USING (iddesigner)
        JOIN tb_user USING (iduser)
        WHERE iddesigner = $iddesigner";

      return $this->db->query($sql)->getResult();
    }

    public function countAllStatus($iddesigner){
      $sql = "SELECT count(idorder) AS hitung FROM tb_order WHERE iddesigner = $iddesigner";
      return $this->db->query($sql)->getResult();
    }

    public function countStatusDone($iddesigner){
      $sql = "SELECT count(idorder) AS hitung FROM tb_order WHERE iddesigner = $iddesigner AND idstatus = 8";
      return $this->db->query($sql)->getResult();
    }

    public function countStatusOngoing($iddesigner){
      $sql = "SELECT count(idorder) AS hitung FROM tb_order WHERE iddesigner = $iddesigner AND idstatus < 8";
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

    public function getDesignerById($iddesigner){
      $sql = "SELECT * FROM tb_designer WHERE iddesigner = $iddesigner";
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

    public function getWorksByDesigner($iddesigner){
      $sql = "SELECT tb_order.designpreview1 AS work1, tb_order.designpreview2 AS work2 
                FROM tb_order JOIN tb_designer USING (iddesigner)
                WHERE tb_order.designpreview1 IS NOT NULL 
                OR tb_order.designpreview2 IS NOT NULL
                AND iddesigner = $iddesigner";
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

    public function countDesigner(){
      $sql = "SELECT count(*) AS cd FROM tb_designer";

      return $this->db->query($sql)->getResult();
    }

	}

?>