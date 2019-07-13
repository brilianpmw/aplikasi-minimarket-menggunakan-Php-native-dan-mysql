<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$menu=$_GET['menu'];
echo "
<table width='300' border='0'>
<tr class='button_tabel'>";
if($page>1){
	$prev=$page-1;
	echo "
	<td><a herf='".$_SERVER['PHP_SELF']."?menu=".$menu."&page=1'>First</a></td>
	<td><a herf='".$_SERVER['PHP_SELF']."?menu=".$menu."&page=".$prev."'>Prev</a></td>";}
	if($page==1){
		echo "
		<td>First</td>
		<td>Prev</td>";}
		if($page<$total_page){
			$next=$page+1;
			echo "
	<td><a herf='".$_SERVER['PHP_SELF']."?menu=".$menu."&page=".$next."'>Next</a></td>
	<td><a herf='".$_SERVER['PHP_SELF']."?menu=".$menu."&page=".$total_page."'>Last</a></td>";}
	if($page>=$total_page){
		echo "
		<td>Next</td>
		<td>Last</td>";}
		echo"<td>Halaman:".$page."/".$total_page."</td>
		</tr>
		</table>";
		?>
		