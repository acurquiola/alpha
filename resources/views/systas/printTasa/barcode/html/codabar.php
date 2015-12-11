<?php
define('IN_CB',true);
include('header.php');

$keys = array('0','1','2','3','4','5','6','7','8','9','-','$',':','/','.','+','A','B','C','D');

$n = $table->numRows();
$table->insertRows($n, 3);
$table->addRowAttribute($n,'class','table_title');
$table->addCellAttribute($n,0,'align','center');
$table->addCellAttribute($n,0,'colspan','2');
$table->setText($n,0,'<font color="#ffffff"><b>Specifics Configs</b></font>');
$table->setText($n+1,0,'Keys');
$text2display = '';
$c = count($keys);
for($i=0;$i<$c;$i++)
	$text2display .= '<input type="button" value="'.$keys[$i].'" style="width:25px" onclick="newkey(this.form,\''.$keys[$i].'\')" /> ';
$table->setText($n+1,1,$text2display);
$table->setText($n+2,0,'Explanation');
$table->setText($n+2,1,'<ul style="margin: 0px; padding-left: 25px;"><li>Known also as Ames Code, NW-7, Monarch, 2 of 7, Rationalized Codabar.</li><li>Codabar was developed in 1972 by Pitney Bowes, Inc.</li><li>This symbology is useful to encode digital information. It is a self-checking code, there is no check digit.</li><li>Codabar is used by blood bank, photo labs, library, FedEx...</li><li>Coding can be with an unspecified length composed by numbers, plus and minus sign, colon, slash, dot, dollar.</li></ul>');
$table->draw();

echo '</form>';

include('footer.php');
?>