<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Registration form</title>
</head>

<body>
	<h2 style="text-align: center;"> Register Here</h2>
	<form method="post" class="form-group" enctype="multipart/form-data">
		<table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
			<tr>
				<td colspan="2"><?php echo @$error; ?></td>
			</tr>	
			<tr>
				<td width="230" class="form-control">First Name</td>
				<td width="329"><input type="text" class="form-control" required name="fname" placeholder="Enter your firstname" /></td>
			</tr>
			<tr>
				<td width="230">Last Name</td>
				<td width="329"><input type="text" class="form-control" required  name="lname" placeholder="Enter your lastname" /></td>
			</tr>
			<tr>
				<td width="230">Date of Birth</td>
				<td width="329"><input type="text" class="form-control" required  name="dob" placeholder="Date of Birth" /></td>
			</tr>
			<tr>
				<td width="230">Address</td>
				<td width="329"><input type="text"  class="form-control" required  name="address" placeholder="Enter your address" /></td>
			</tr>
				<th colspan="2">Experience</th>
			<tr>
				<td width="230">Company Name</td>
				<td width="329"><input type="text" class="form-control" required  name="cname[]" placeholder="Company Name" /></td>
			</tr>
			<tr>
				<td width="230">Description</td>
				<td width="329"><input type="text"  class="form-control" required  name="cdesc[]" placeholder="Exp. Description" /></td>
			</tr>
			<tr id="dynamic_field">  </tr>
			<tr>
				<td  width="230">ADD MORE EXPERIENCE </td>
				<td>  <button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
			</tr>
			<tr>
				<td width="230">Portfolio Images</td>
				<td width="329"><input type="file"  class="form-control" required multiple="" name="portfolio_file[]" size="20" /></td>
			</tr>
			<tr>
				<td>Enter Your Username </td>
				<td><input type="text" class="form-control" required  name="username"/></td>
			</tr>

			<tr>
				<td>Enter Your Password </td>
				<td><input type="password" class="form-control" required  name="pass"/></td>
			</tr>

			<tr>
				<td colspan="2" align="center">
				<input type="submit" name="register" class="btn btn-info" value="Register Me"/></td>
			</tr>
		</table>
			<div style="text-align: center; margin-top: 30px;">
				<p> See all Listing <a href="<?php echo site_url('user') ?>">here</a></p>
			</div>
	</form>
</body>
<!-- Extra Script For this page -->
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'"><tr><td width="230">Company Name</td><td width="329"><input type="text" class="form-control" required  name="cname[]" placeholder="Company Name" /></td></tr><tr><td width="230">Description</td><td width="329"><input type="text"  class="form-control" required  name="cdesc[]" placeholder="Exp. Description" /></td></tr><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>');
     	});
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>
<!-- Extra Script For this page Ends here -->
</html>