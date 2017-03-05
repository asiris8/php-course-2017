<?php
	$fp = fopen($_FILES['f']['tmp_name'], 'r');

	$mass = [];
	if ($fp) 
	{		
		$i = 0;
		while (!feof($fp))
		{	
			$mytext = fgets($fp, 999);
			$mass[$i] = explode(";", $mytext);
			
			for ($k=0;$k<count($mass[$i]);++$k){
				if (iconv_strlen($mass[$i][$k]) > 0) 
				{
					trim($mass[$i][$k]);
				}
				else{
					if ($k < 4){

						echo'<h1><font color = "red">'."in line ".$i." not filled ".$mass[0][$k].'</font></h1>';
					} 
						
				}

			} 
					
			//echo 'string:'.$mytext."<br />";
			++$i;	
		}


		//echo "Array:<br />";

		/*for($i=0;$i<count($mass);++$i)
		{
			for($j=0;$j<count($mass[$i]);++$j)
				echo $mass[$i][$j]." ";	

			echo "<br />";	
		}*/

	
	}

	else echo "Ошибка при открытии файла";
	fclose($fp); 

/*$lines = [];
for ($i = 0; $i < 10: $i++) {
	$row = [1, 2, 3];
	$lines[] = $row;

	$lines[] = [1, 2, 3];
	$lines[$k][$c];
}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Вывод данных</title>
	</head>
	<body>
		<TABLE>
			<?php for($i=0;$i<count($mass);++$i): ?>
			<tr>
				<?php for($j=0;$j<count($mass[$i]);++$j):?>
				<td><?php echo $mass[$i][$j]; ?></td>
				<?php endfor;?>
			</tr>
			<?php  
			endfor;?>

		</TABLE>
	</body>
</html>
