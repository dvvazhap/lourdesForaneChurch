<?php
echo "{$page} home page <hr/>";
echo "<table><tr><th>{$page} Name</th></tr>";
$query = "SELECT * FROM {$page}_table ORDER BY name ASC";
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_array($result)){
echo "<tr><td>{$row['name']}</td>
<td><input type=\"button\" onClick=\"location.href='admin_{$page}.php?page={$page}&id={$row['id']}&action=24'\" value=\"Edit\"/></td>";
echo"<td><input type=\"button\" onClick=\"location.href='admin_{$page}.php?page={$page}&id={$row['id']}&action=23'\" value=\"Delete\"/></td></tr>";
} 
echo "</table>";
echo "<br/><a href=\"admin_{$page}.php?page={$page}&action=20\">Add a new {$pag}</a><hr/>";
?>