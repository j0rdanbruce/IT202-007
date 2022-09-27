<?php
$A1 =[-1, -2, -3, -4, -5, -6, -7, -8, -9, -10];
$B2 =[-1, 1, -2, 2, 3, -3, -4, 115];
$C3 =[-0.03, 0.0002, -.11];
$D4 =['-1',"hello","2","-3","-4","5","-6","6",'-7','71',"71","a"];
function bePositive($arr) {
    //use the $arr variable to iterate over
    echo "<br>Processing Array: <br> <pre>". var_export($arr, True) . "</pre>";
    echo "<br>Positive Output";
	//TODO echo to output any value that positive (i.e., ignore negatives and characters)
}
?>
<h2> Problem 3: Be Positive</h2>
<table>
<thead>
	<th>A1</th>
	<th>B2</th>
	<th>C3</th>
	<th>D4</th>
</thead>
<tbody>
	<tr>
		<td>
			<?php bePositive($A1); ?>
		</td>
		<td>
			<?php bePositive($B2); ?>
		</td>
		<td>
			<?php bePositive($C3); ?>
		</td>
		<td>
			<?php bePositive($D4); ?>
		</td>
	</tr>
</tbody>
</table>
<style>
	table {
		border-spacing: 5px 10px;
		border-collapse : separate;
	}
	td {
		border-right: solid 3px blue;
		border-left: dashed 3px red;
	}
</style>