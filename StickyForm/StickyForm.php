<html>
<body>
<table border=1>
<tr><th colspan=2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
<tr><td>Enter Name</td><td><input type="text" name="nm" value="<?php
if(isset($_POST['nm']))echo $_POST['nm']?>"</td></tr>
<tr><td>Enter Roll No</td><td><input type="text" name="rno" value="<?php
if(isset($_POST['rno']))echo $_POST['rno']?>"</td></tr>
<tr><td>Enter State</td><td><input type="text" name="st" value="<?php
if(isset($_POST['st']))echo $_POST['st']?>" </td></tr>
<tr><td>Enter City</td><td><input type="text" name="ct" value="<?php
if(isset($_POST['ct']))echo $_POST['ct']?>"</td></tr>
<tr><td>Enter Percentage</td><td><input type="text" name="per" value="<?php
if(isset($_POST['per']))echo $_POST['per']?>"</td></tr>
<tr><td><input type="submit" value="Submit" name="submit"></td>
<td><input type="reset" value="Reset"></td></tr>
</form>
</table>
<?php
if(isset($_POST['submit']))
{
$nm=$_POST['nm'];
$rno=$_POST['rno'];
$st=$_POST['st'];
$ct=$_POST['ct'];
$perc=$_POST['per'];
}
if((!empty($nm)) && (!empty($rno)) && (!empty($st)) && (!empty($ct)) && (!empty($perc)))
{
    setcookie('nm',$nm);
    setcookie('rno',$rno);
    setcookie('st',$st);
    setcookie('ct',$ct);
    setcookie('perc',$perc);
    header("location:slip14_1.php");
    }
    ?>
    </body>
    </html>