<?php
		ini_set('display_errors', 'Off');
		ini_set('html_errors', 'Off');
		
        $aw = fopen('awards.csv', 'r');
        $co = fopen('contracts.csv', 'r');
         while (($data = fgetcsv($aw, 0, ",")) !== FALSE) {
            $awards[]=$data;
        }
        while (($data = fgetcsv($co, 0, ",")) !== FALSE) {
                $contracts[]=$data;
        }
 		  
        for($x=0;$x< count($contracts);$x++)
        {
            if($x==0){
                unset($awards[0][0]);
                $line[$x]=array_merge($contracts[0],$awards[0]); //header
            }
            else{
                $dl=0;
                for($y=0;$y <= count($awards);$y++)
                {
                    if($awards[$y][0] == $contracts[$x][0]){
                        unset($awards[$y][0]);
                        $line[$x]=array_merge($contracts[$x],$awards[$y]);
                        $dl=1;
                    }           
                }
                if($dl==0)
                    $line[$x]=$contracts[$x];
            }
        }
  		    
        $fi = fopen('final.csv', 'w');
        
        foreach ($line as $fields) {
            fputcsv($fi, $fields);
        }

        function read_csv($filename){
        	$rows = array();
        	foreach(file($filename)as $line){
        		$rows[] = str_getcsv($line);
        	}
        	
			$i=0;
        	while($i<count($rows)){
        		if($rows[$i][1]=="Current"){

        			$amount[] = $rows[$i][12];
        			while($j<count($amount)){
        				if($amount[$j]!=0){
        					$summ = array_sum($amount);
        					echo "Total Amount of Current contracts: " . $summ;

        				}
        				$j++;
        			}        		     			        		
             	}
             	$i++;
        	}
    	}	
      echo read_csv('final.csv');
		  fclose($fi);
?>
