<?php namespace App\Models;

  use CodeIgniter\Model;

  class M_frontpage extends Model{
    protected $table      = 'tb_static';
    protected $primaryKey = 'idstatic';

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

    public function getHomeFrontpage(){
      $sql = "SELECT * FROM tb_static WHERE tag LIKE '%home%'";
      return $this->db->query($sql)->getResult();
    }

    public function getDetailFrontpage($idstatic){
        $sql = "SELECT * FROM tb_static WHERE idstatic = $idstatic";
        return $this->db->query($sql)->getResult();
    }

    public function updateFrontpage($dataset, $idstatic){
        $builder = $this->db->table('tb_static');
        $builder->where('idstatic', $idstatic);
        $builder->update($dataset);
    }

    // public function insertFrontpage($data){
    //   $builder = $this->db->table('tb_static');
    //   $builder->insert($data);
    // }

    // public function updatePengelola($dataset, $iduser){
    //   $builder = $this->db->table('tb_static');
    //   $builder->where('iduser', $iduser);
    //   $builder->update($dataset);
    // }
  }
?>