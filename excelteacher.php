<?php
include "includes/connect.php";
$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);
$output ='<table>
<tr>
<th align = "center">id</th>
<th align = "center">Name</th>
<th align = "center">Age</th>
<th align = "center">Address</th>
<th align = "center">Salary</th>
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center">'.$excel['id'].'</th>
    <th align = "center">'.$excel['name'].'</th>
    <th align = "center">'.$excel['age'].'</th>
    <th align = "center">'.$excel['address'].'</th>
    <th align = "center">'.$excel['salary'].'</th>
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=excelteacher.xls');
echo $output;
?>