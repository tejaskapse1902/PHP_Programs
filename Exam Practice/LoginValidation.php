<html>
<head>
<title>Sticky Form</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
<input type=text name=txtuname value="<?php if(isset($_POST['txtuname']))echo
$_POST['txtuname'];?>" ></br>
<input type=password name=txtupass value="<?php if(isset($_POST['txtupass']))echo
$_POST['txtupass'];?>" ></br>
<input type=submit value="Login" name=submit>
<?php
if(isset($_POST['submit']))
$nm=$_POST['txtuname'];
$ps=$_POST['txtupass'];
$con=mysql_connect("localhost","root"," ");
mysql_elect_db("mydb",$con);
$result=mysql_query("select * from login where uname='$nm' and upass='$ps'");
$flag=0;
while($row=mysql_fetch_array($result))
{
$flag++;
}
if($flag==1)
echo "Login validated";
else
echo "username or password invalid";
?>
</body>
</html>