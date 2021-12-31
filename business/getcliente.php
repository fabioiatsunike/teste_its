<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>


<?php 

	function get_clientes(){
		 $db = open_database();

		 if ($db) {
		 	$select = $db->query("SELECT * FROM cliente");
		 	if($select->num_rows >0)
			{
				$found = array();
        		while ($row = $select->fetch_assoc()) {
          			array_push($found, $row);
          		}
			}
		 }
		
		close_database($db);
		return $found;
	}
?>