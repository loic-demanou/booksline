<?php
class panier{
    private $db;
    public function __construct($db){
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier']=array();
        }
        $this->db=$db;
        if (isset($_GET['delPanier'])) {
            $this->del($_GET['delPanier']);
        }
        if (isset($_POST['panier']['quantity'])) {
            # code...
            $this->recalc();
        }
        
    }

    public function recalc(){
        foreach ($_SESSION['panier'] as $product_id => $quantity) {
            
            if (isset($_POST['panier']['quantity'][$product_id])) {
                $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
   
            }
        }
        
    }

    public function count(){
       return array_sum($_SESSION['panier']);
    }


    public function total(){
        $total=0;
        
        $ids=array_keys($_SESSION['panier']);
        if (empty($ids)) {
            $products=array();
        }else {
            $products=$this->db->prepare('SELECT id, prix_total FROM ouvrage WHERE id IN ('.implode(',',$ids).')');
            $products->execute(array());
            $product= $products->fetchAll();
        }
        foreach ($product as $products) {
            # code...
            $total += $products['prix_total'] * $_SESSION['panier'][$products['id']];
        }
        return $total;
            

        
    }

    public function add($product_id){
        if (isset($_SESSION['panier'][$product_id])) {
            # code...
            $_SESSION['panier'][$product_id]++;
        }else {
            $_SESSION['panier'][$product_id]=1;
        }
        
    }
    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }

    public function delPanier(){
        unset($_SESSION['panier']);
    }
}