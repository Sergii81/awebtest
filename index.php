<?php
	ini_set("display_errors", 1);	
    Error_Reporting(E_ALL & ~E_NOTICE);

    
	
	if (empty($_POST['name'])) {
        
            $answer=[
                'status' => 'error',
                'message' => 'Enter Name',
                    ];
           echo json_encode($answer);
        } //else {
        	if (isset($_POST['name']) && isset($_POST['phone'])){
		    	$dsn = "mysql:host=localhost;dbname=testaweb;charset=utf8";
				$opt = array (
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
							PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
				$pdo = new PDO($dsn, 'root', '', $opt);
		    	$user = $pdo->prepare('INSERT INTO users SET  name = ?, phone = ?');
				$user->execute(array($_POST['name'], $_POST['phone']));
		    } 	
					
		    if ($user){
		        $answer= [
				    'status' => 'added',
				    'message' => 'Data is added',
				          ];
				echo json_encode($answer);
		        	}
		        //}
    
        	
		            

        	

?>