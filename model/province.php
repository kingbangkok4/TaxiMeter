<?php
header('Content-Type: text/html; charset=utf-8');
class Province {

    public $sql;

    public function read() {
        $this->sql = " SELECT * FROM `province` ORDER BY id ";
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