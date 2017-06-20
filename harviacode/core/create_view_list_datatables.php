<?php 

$string = "
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <h2 style=\"margin-top:0px\">".ucfirst($table_name)." List</h2>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 4px\"  id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-4 text-right\">
                <?php echo anchor(site_url('".$c_url."/create'), 'Create', 'class=\"btn btn-primary\"'); ?>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-success\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-danger\"'); ?>";
}


$string .= "\n\t    </div>
        </div>
        
        <table class=\"table table-bordered table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th>No</th>";
foreach ($all as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th>Action</th>
                </tr>
            </thead>";
$string .= "\n\t    <tbody>
            <?php
            \$start = 0;
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t    <td><?php echo ++\$start ?></td>";


foreach ($all as $row) {
    if($star === $c){
        $ok=false;
        foreach($table_list as $test) {
            if ($test['column_name'] == $row['column_name']) {
                $string .= "\n\t\t\t<td><?php echo $".$test['table_name']."[$" . $c_url ."->". $row['column_name'] . "] ?></td>";
                $ok =true;
            }
        }
        if(!$ok)
            $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
    }
    else
        $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}
$i=0;
$addstring="";
foreach ($pk as $k=>$row) {
    if($i >0)
        $addstring .= ".'&";
    $addstring .= "".$row['column_name']."='.$".$c_url."->".$row['column_name'];
    $i++;
}

$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
    . "\n\t\t\t\t<?php "
    . "\n\t\t\t\techo anchor(site_url('".$c_url."/read?".$addstring."),'Read',array('class' => 'btn btn-xs btn-primary')); "
    . "\n\t\t\t\techo ' | '; "
    . "\n\t\t\t\techo anchor(site_url('".$c_url."/update?".$addstring."),'Update',array('class' => 'btn btn-xs btn-success')); "
    . "\n\t\t\t\techo ' | '; "
    . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete?".$addstring."),'Delete',array('class' => 'btn btn-xs btn-danger','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"')); "
    . "\n\t\t\t\t?>"
    . "\n\t\t\t</td>";


$string .=  "\n\t        </tr>
                <?php
            }
            ?>
            </tbody>";

$string .= "<tfoot id=\"filters\">
                <td>No</td>";
foreach ($all as $row) {
    $string .= "\n\t\t    <td>" . label($row['column_name']) . "</td>";
}
$string .= "\n\t\t    <td>Action</td>
            </tfoot>";

$string .="</table>
        <div class=\"col-lg-12 col-md-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <i class=\"fa fa-bar-chart-o fa-fw\"></i> ".ucfirst($table_name)."

                </div>
                <!-- /.panel-heading -->
                <div class=\"panel-body\">
                    <div class=\"row\">
                        <div class=\"col-lg-12\">
                            <div id=\"linechart\"></div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        
  ";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>