<?php
    $nm=$_GET['srch'];
    $fp=fopen("employee.dat","r");
    echo "<table border=1><tr><th>EmpId</th><th>Employee Name</th></tr>";
        while($res=fscanf($fp,"%s %s"))
        {
            if($res[1]==$nm)
            {
                echo "<tr><td>".$res[0]."</td><td>".$res[1]."</td><tr>";
            }
        }
echo "</table>";