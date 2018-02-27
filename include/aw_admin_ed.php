<?php
echo "<h2 class='heading'>".strtoupper($page)." PAGE </h2><hr/>";
echo "<table><tr><th>".strtoupper($page)."</th></tr>";
$query = "SELECT * FROM {$page}_table ORDER BY name ASC";
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_array($result)){
echo "<tr><td>".strtoupper($row['name'])."</td>
<td><input type=\"button\" onClick=\"location.href='admin_{$page}.php?page={$page}&id={$row['id']}&action=24'\" value=\"Edit\"/></td>";
echo"<td><input type=\"button\" onClick=\"location.href='admin_{$page}.php?page={$page}&id={$row['id']}&action=23'\" value=\"Delete\"/></td></tr>";
} 
echo "</table>";
echo "<br/><a href=\"admin_{$page}.php?page={$page}&action=20\">ADD A NEW ".strtoupper($pag)."</a><hr/>";
?>