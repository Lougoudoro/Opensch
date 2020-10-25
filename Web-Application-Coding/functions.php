<?php
include 'utilities/QueryBuilder.php';
function MatriculAttrib()
{
	$obj = new QueryBuilder();
	//SELECTION OF THE LAST ID
	$last_id = $obj->Requete('SELECT * FROM etudiant ORDER BY ID_ETUDIANT DESC LIMIT 1');
	$last_id = $last_id->fetch();
	$last_id = $last_id['ID_ETUDIANT'];
	//SELECTION OF THE AMOUNT OF EXISTING ROWS
	$total_rows = $obj->Requete('SELECT COUNT(*) AS MAXI FROM etudiant');
	$total_rows = $total_rows->fetch();
	$total_rows = $total_rows['MAXI'];

	//INCREMENTATION OF THE LAST ID
	$last_id = 999999;
	//$last_id++;

	//SET OF THE NUMBER OF CHARACTERS OF THE $total_rows
	$t_rows_len = strlen($last_id); 
	//$t_rows_len = 8;

	//SET OF THE MAXIMUM NUMBER OF ZERO
	//we start to open the file containing the maximum of number in read and modifiy mode
	$file = fopen('max.txt', 'r+');
	//read and affecting the cntent of the file in the variable $max_zero
	$max_zeros = fgets($file);
	//echo $max_zeros.'<br>';
	
	//CHECK THAT THE LENGTH OF THE NUMBER OF ROWS IS LESS OR EQUAL TO THE MAX OF ZEROS
	if ($t_rows_len <= $max_zeros)
	{
		$matricul = 'bs';
		for ($i=0; $i < $max_zeros-$t_rows_len; $i++)
		{ 
			$matricul .= '0';
		}
		$matricul .= $last_id;
	}
	//OTHERWISE, WE INCREMENT THE NUMBER OF ZEROS
	else
	{
		/*if (isset($_POST['update']))
		{*/
			$max_zeros++;
			//we set the cursor at the beginning of the file
			fseek($file, 0);
			//we now input the incremented number
			fputs($file, $max_zeros);
			$matricul = 'bs';
			for ($i=0; $i < $max_zeros-$t_rows_len; $i++)
			{ 
				$matricul .= '0';
			}
			$matricul .= $last_id;
		//}
	}
	//we close the file
	fclose($file);
	echo $matricul;
}
MatriculAttrib();

 ?>