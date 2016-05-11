<?php
header('Content-Type: text/html; charset=utf-8');
class Product {

    public $sql;
	
    public function insert($data) {
        $this->sql = "INSERT INTO tb_product (`id`, `product_id`, `product_name`, `product_unit`, `quantity`, `product_cost`, `product_price`) VALUES (NULL, '{$data["product_id"]}', '{$data["product_name"]}', '{$data["product_unit"]}', '{$data["quantity"]}', '{$data["product_cost"]}', '{$data["product_price"]}')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
   public function insert_in($data) {
        $this->sql = "INSERT INTO tb_productin (`id`, `product_id`, `quantity`, `user`) VALUES (NULL, '{$data["product_id"]}', '{$data["quantity"]}', '{$data["user"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            //return false;
			return $this->sql;
        }
    }
	
	   public function insert_out($data) {
        $this->sql = "INSERT INTO tb_productout (`id`, `product_id`, `quantity`, `user`) VALUES (NULL, '{$data["product_id"]}', '{$data["quantity"]}', '{$data["user"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            //return false;
			return $this->sql;
        }
    }


    public function update($data, $condition) {
        $this->sql = "UPDATE tb_product SET product_id = '{$data["product_id"]}', product_name = '{$data["product_name"]}', product_unit = '{$data["product_unit"]}', quantity='{$data["quantity"]}', low_quantity='{$data["low_quantity"]}', product_cost='{$data["product_cost"]}', product_price = '{$data["product_price"]}' WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query) {
			return true;
        } else {
            return false;
        }
    }

    public function update_product_in($data) {
        $this->sql = "UPDATE tb_product SET quantity = quantity + {$data["quantity"]} WHERE product_id = '{$data["product_id"]}' ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query) {
			return true;
        } else {
            return false;
        }
    }
	
	 public function update_product_out($data) {
        $this->sql = "UPDATE tb_product SET quantity = quantity - {$data["quantity"]} WHERE product_id = '{$data["product_id"]}' ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query) {
			return true;
        } else {
            return false;
        }
    }
	
    public function delete($condition) {
        $this->sql = "DELETE FROM tb_product WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

 public function delete_in($condition) {
        $this->sql = "DELETE FROM tb_productin WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	 public function delete_out($condition) {
        $this->sql = "DELETE FROM tb_productout WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
    public function read($condition = " 1=1") {
        $this->sql = "SELECT * FROM tb_product WHERE $condition";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }
	
	public function read_sale($condition = " 1=1") {
        $this->sql = " SELECT po.product_id, po.quantity, po.productout_date, p.product_name, p.product_price, p.product_unit, (po.quantity * p.product_price) AS sum_price FROM tb_productout po LEFT OUTER JOIN tb_product p ON po.product_id = p.product_id WHERE $condition ";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return $this->sql;
        }
    }
	
	public function read_in($condition = " 1=1 ") {
        $this->sql = "";
		if($condition == " 1=1 "){
			 $this->sql = " SELECT pi.user, pi.id, pi.product_id, pi.quantity, pi.productin_date, p.product_name, p.product_unit, p.product_price,  p.product_price * pi.quantity AS sum_price FROM tb_productin pi LEFT OUTER JOIN tb_product p ON pi.product_id = p.product_id ORDER BY productin_date DESC ";
		}else{
			 $this->sql = " SELECT pi.user, pi.id, pi.product_id, pi.quantity, pi.productin_date, p.product_name, p.product_unit, p.product_price,  p.product_price * pi.quantity AS sum_price  FROM tb_productin pi LEFT OUTER JOIN tb_product p ON pi.product_id = p.product_id ORDER BY productin_date DESC WHERE $condition ";	
		}
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }
	
	public function read_out($condition = " 1=1 ") {       
		$this->sql = "";
		if($condition == " 1=1 "){
			  $this->sql = " SELECT po.user, po.id, po.product_id, po.quantity, po.productout_date, po.pay_status, p.product_name, p.product_unit, p.product_price,  p.product_price * po.quantity AS sum_price  FROM tb_productout po LEFT OUTER JOIN tb_product p ON po.product_id = p.product_id  ORDER BY productout_date DESC ";
		}else{
			  $this->sql = " SELECT po.user, po.id, po.product_id, po.quantity, po.productout_date, po.pay_status, p.product_name, p.product_unit, p.product_price,  p.product_price * po.quantity AS sum_price  FROM tb_productout po LEFT OUTER JOIN tb_product p ON po.product_id = p.product_id WHERE $condition ";
		}
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }

    public function read_productout($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM tb_productout WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            if (count($result) > 0) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
	
	 public function read_unit($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM tb_unit WHERE $condition";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }
	
	public function update_status($id, $status) {
        $this->sql = "UPDATE tb_productout SET pay_status = {$status} WHERE id ={$id} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_status_product($id, $status) {
        $this->sql = "UPDATE tb_product SET status = {$status} WHERE id ={$id} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_new_product_id($condition = " 1=1 "){
		$this->sql = "SELECT MAX(product_id) + 1 AS new_product_id FROM `tb_product` WHERE {$condition} ";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
			$new_product_id = "";
			$new_product_row = $result[0];
			$lenght =  strlen($new_product_row["new_product_id"]);
			switch ($lenght) {
				case 1:
					$new_product_id = "00".$new_product_row["new_product_id"];
					break;
				case 2:
					$new_product_id = "0".$new_product_row["new_product_id"];
					break;
				default:
					$new_product_id = $new_product_row["new_product_id"];
					break;
			}
            return $new_product_id;
        } else {
            return "error!";
        }
	}

}
