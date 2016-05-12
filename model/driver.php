<?php
header('Content-Type: text/html; charset=utf-8');
class Driver {

    public $sql;

    public function read($condition = " 1=1") {
         $this->sql = "SELECT * FROM driver WHERE $condition";
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
	
}

?>
