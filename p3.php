<?php
include 'connect.php';
if(isset($_POST['submit'])){

		$name= $_POST['name'];
		$cname= $_POST['cname'];
		$coname= $_POST['coname'];
		$email= $_POST['email'];
		$iname= $_POST['iname'];
		$hname= $_POST['hname'];
		$mname= $_POST['mname'];
        $photo= $_FILES['photo'];
        
        
    $filename=$photo['name'];
    $filepath=$photo['tmp_name'];
    $fileerror=$photo['error'];

    if($fileerror==0){
        $destfile= 'upload/'.$filename;
        //echo "$destfile";
       move_uploaded_file($filepath,$destfile);

		
		
			$insertquery= "INSERT INTO user(Name,College,Course,Email,Interests,hobby,membership,photograph) VALUES ('$name','$cname','$coname','$email','$iname','$hname','$mname','$destfile')";
			$query= mysqli_query($conn, $insertquery);
			
			if($query)
			{
					echo '<script>alert("Data inserted")</script>';
			}
			else
			{
					echo "not inserted";
				}
}}
else 
{
	echo "no button clicked";
}

?>


<!DOCTYPE html>

<style>
h1,h4 {
  color: lightpink;
  text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}
h2,h3 {
	color: white;
	text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
	}

.backImg {
width: 100%;
height: 100vh;
background: url("new2.jpg");
display: flex;
justify-content: center;
text-align: center;
align-items: center;
}
img{
	height:300px;
	border-radius: 60%;
	}
.serif {
  font-family: "Times New Roman", Times, serif;
}
</style>

<head>
<div class="backImg">
<title>your homepage</title>
<p class="serif">
<div class="jumbotron jumbotron-fluid">
  <div class="container">   
	
	<h1><?php echo "$name" ?></h1>
    <h4>Personal homepage development</h4>
  </div>
</head>

<body>
<div class="container">
<img src="<?php print_r($destfile) ?>" alt="no-img">
<h2>College name: <?php echo "$cname" ?>  <br>Course: <?php echo "$coname" ?></br></h2>
<h3>Email-ID: <?php echo "$email" ?> </h3>
<h3>Areas of Interests: <?php echo "$iname" ?><br>Hobbies and passion: <?php echo "$hname" ?><br>Member of technical society: <?php echo "$mname" ?> </br></br> </h3> 
</div>

</body>
</html>