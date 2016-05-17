<?php
header('Content-Type: text/html; charset=utf-8');
class Service {
    public $sql;

    public function read($condition = "1=1") {
         $this->sql = "SELECT "
                 . "s.serviceID, "
                 . "s.serviceDate, "
                 . "s.status, "
                 . "c.carID, "
                 . "c.brand, "
                 . "c.licensePlate, "
                 . "d.driverID, "
                 . "d.name AS name_driver, "
                 . "d.idCard, "
                 . "m.memberID, "
                 . "m.name AS name_member, "
                 . "m.gender, "
                 . "m.email, "
                 . "m.phone "
                 . "FROM service s left outer join car c ON s.carID = c.carID "
                 . "left outer join driver d ON s.driverID = d.driverID left outer join member m ON s.memberID = m.memberID  "                
                 . "WHERE $condition "
                 . "ORDER BY serviceID DESC ";
         
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
    
        public function read_taxi($condition = " 1=1") {
         $this->sql = "SELECT "
                 . "c.carID, "
                 . "c.brand, "
                 . "c.licensePlate, "
                 . "d.driverID, "
                 . "d.name, "
                 . "d.idCard "
                 . "FROM rent r left outer join car c ON r.carID = c.carID left outer join driver d ON r.driverID = d.driverID WHERE $condition";
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
    
    public function insert($data) {
        $this->sql = "INSERT INTO service (`serviceID`, `carID`, `driverID`, `serviceDate`, `memberID`, `status`) VALUES (NULL, {$data["carID"]}, {$data["driverID"]}, '{$data["serviceDate"]}', '{$data["memberID"]}', 'กำลังให้บริการ') ";
        mysql_query("SET NAMES 'utf8'");
	    $query = mysql_query($this->sql);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function update_status($serviceID) {
        $this->sql = "UPDATE service SET status = 'สิ้นสุดการให้บริการ' WHERE serviceID = {$serviceID} ";
        mysql_query("SET NAMES 'utf8'");
	$query = mysql_query($this->sql);       
        if ($query) {
	   return true;
        } else {
            return false;
        }
    }
    
    public function delete($serviceID) {
        $this->sql = "DELETE FROM service WHERE serviceID = {$serviceID} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
	
    }
    
}

?>
