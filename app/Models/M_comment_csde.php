<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_comment_csde extends Model	{
	 	protected $table      = 'tb_comment_csde';
    protected $primaryKey = 'idcomment';

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

    public function getAllComments(){
      $sql = "SELECT * FROM tb_comment_csde";
      return $this->db->query($sql)->getResult();
    }

    public function getCommentsByIdOrder($idorder){
      $sql = "SELECT tb_comment_csde.*,
        tb_cs.name as cs_name,
        tb_cs.cs_pic as cs_pic,
        tb_designer.name as designer_name,
        tb_designer.designer_pic as designer_pic
        FROM tb_comment_csde LEFT JOIN tb_cs USING (idcs)
          LEFT JOIN tb_designer using (iddesigner)
          ORDER BY commenttime";

      return $this->db->query($sql)->getResult();
    }

    public function sendComment($dataset){
      $builder = $this->db->table('tb_comment_csde');
      $builder->insert($dataset);
    }
  }
?>