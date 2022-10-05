<?php
$a1 =[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
$a2 =[-3,-2,-1,0,1,2,3,4,5,6,7,8,9,10];
$a3 =[15,14,13,12,11,10,9,8,7,6,5,4,3,2,1,0];
$a4 =[0,0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10];
function processArray($arr) {
    //use the $arr variable to iterate over
    echo "<br>Processing Array: <br> <pre>". var_export($arr, True) . "</pre>";
    echo "<br>Divisible By 3 Output:<br>";
    //TODO add logic here to echo out any values divisible by 3 
    foreach($arr as $num){
        if ($num % 2 != 0){
            echo $num, ", ";
        }
    }
}
?>
<h2> Problem 1: Divisible By 3 Output</h2>
<table>
    <thead>
        <th>a1</th>
        <th>a2</th>
        <th>a3</th>
        <th>a4</th>
    </thead>
    <tbody>
        <tr>
            <td>
                <?php processArray($a1); ?>
            </td>
            <td>
                <?php processArray($a2); ?>
            </td>
            <td>
                <?php processArray($a3); ?>
            </td>
            <td>
                <?php processArray($a4); ?>
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
		border-right: solid 3px black;
		border-left: solid 3px black;
	}
</style>