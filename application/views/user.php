<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users Listing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}


	#body {
		margin: 0 15px 0 15px;
	}
table {
    border-collapse: collapse;
}

table td {
    border: 1px solid #333;
    padding:1%;
}

	</style>
</head>
<body>

<div id="container">
	<h1>User's Listing</h1>

	<div id="body">
		<table class="">
			<th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Address</th><th>Company Name</th><th>Company Description</th><th>Username</th>
		<?php 
		foreach($users as $user) {

			/* Multiple Company Names and Company Description conversion to Json */
			$company_name_json = str_replace(array("\t","\n"), "", $user->Company_Name);
			$company_name_json_data = json_decode($company_name_json); 

			$company_desc_json = str_replace(array("\t","\n"), "", $user->Company_Description);
			$company_desc_json_data = json_decode($company_desc_json); 
			/* Multiple Company Names and Company Description conversion to Json ensd here */


			/* Displaying user records */
			echo '<tr>';
			echo '<td width="50">'.$user->id.'</td>';
			echo '<td width="230">'.$user->First_Name.'</td>';
			echo '<td width="230">'.$user->Last_Name.'</td>';
			echo '<td width="230">'.$user->Dob.'</td>';
			echo '<td width="230">'.$user->Address.'</td>';
			$io = 1;
			echo '<td width="230">';
			foreach($company_name_json_data as $item)
			{
				echo '#'.$io.' '.$item.'<br>';
				$io++;
			}
			echo '</td>';
			$cn = 1;
			echo '<td width="230">';
			foreach($company_desc_json_data as $item)
			{
				echo '#'.$cn.' '.$item.'<br>';
				$cn++;
			}
			echo '</td>';
			echo '<td width="240">'.$user->Username.'</td>';
			echo '</tr>';
			/* Displaying user records ends here*/

		}
?>
</table>
	</div>
</div>

</body>
</html>