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

    public function getContactFrontpage(){
        $sql = "SELECT * FROM tb_static WHERE tag LIKE '%contact%'";
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
    
    public function getHomeHero(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_hero'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomeDo(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_do'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomeDoCategories(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_do_categories'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomeAbout(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_about'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomeServices(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_services'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomeServiceCategories(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_services_categories'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomePricing(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_pricing'";
        return $this->db->query($sql)->getResult();
    }


    public function getHomePricingOpt(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_pricing_opt'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomePricingDetail(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_pricing_detail'";
        return $this->db->query($sql)->getResult();
    }

    public function getHomeTestimonials(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'home_testimonials'";
        return $this->db->query($sql)->getResult();
    }

    public function getContact(){
        $sql = "SELECT * FROM tb_static WHERE tag = 'contact'";
        return $this->db->query($sql)->getResult();
    }

  }
?>