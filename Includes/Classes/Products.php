<?php
    require_once 'config.php';
    require_once 'Db_Control.php';

class products extends Db_Control
{
    //set the table name
    public $_table = 'products';
    
    public function __construct() 
    {
        // Add from config.php file
        global $config;

        // Call the parent constructor
    	parent::__construct($config);
    }

    /*
    *  List All products
    *  @return array Returns every products row as array of associative array
    */
    public function getProducts()
    {
        $this->select($this->_table,'','*','Pro_Price');
        return $this->fetchAll();
    }

    /*
    *  Show one product
    *  @param int $pro_Id 
    *  @return array Returns a row as  associative array
    */

    public function getProduct($pro_Id)
    {
        $this->select($this->_table , ' Pro_Id = '.$pro_Id);
        return $this->fetch(); //func return one row 
    }

    /**
     * Add New Product
     * @param array $product_data Associative array containing column and value
     * @return bool Returns true if added successfully
     */
    public function addProduct($product_data)
    {
        return $this->insert($this->_table,$product_data);
    }

     /**
     * Delete existing product
     * @param int $pro_Id
     * @return  int Number of affected rows
     */
    public function deleteProduct($pro_Id)
    {
        return $this->delete($this->_table  , 'Pro_Id = '.$pro_Id);
    }

    /**
     * Update existing product
     * @param $pro_data Associative array containing column and value
     * @param int $pro_Id
     * @return  int Number of affected rows
     */
    public function updatePro($pro_data , $pro_Id)
    {
        return $this->update($this->_table , $pro_data , 'Pro_Id = ' . $pro_Id);

    }
}