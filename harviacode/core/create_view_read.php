<?php 

$string = "
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <table class=\"table\">";
foreach ($all as $row) {
    if($star === $c){
        $ok=false;
        foreach($table_list as $test) {
            if ($test['column_name'] == $row['column_name']) {
                $string .= "\n\t<tr><td>".label($row["column_name"])."</td><td><?php echo $".$test['table_name']."[$" .$row['column_name'] . "] ?></td></tr>";
                $ok =true;
            }
        }
        if(!$ok)
            $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
    }
    else
        $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$addstring="";
foreach ($pk as $k=>$row) {
    if($k !=0)
        $addstring .= ".'&";
    $addstring .= "".$row['column_name']."='.$".$row['column_name'];
}
$string .= "\n\t    <tr><td><a href=\"<?php echo site_url('".$c_url."/update?".$addstring.") ?>\" class=\"btn btn-success\">Update</a></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
      ";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>