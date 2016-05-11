<?php

class User {

    public $sql;

	
	 public function delete($condition) {
        $this->sql = "DELETE FROM tb_user WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

}
