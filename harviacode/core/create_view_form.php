<?php 

$string = "
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." <?php echo \$button ?></h2>
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($all as $row) {
    if($star === $c){
        $ok=false;
        foreach($table_list as $test){
            if($test['column_name'] == $row['column_name']){
                    $string .= "\n\t    <div class=\"form-group\">
                <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
               <?php echo form_dropdown('".$row["column_name"]."',$".$test['table_name'].",$".$row["column_name"].",array(\"id\"=>\"".$row["column_name"]."\",\"class\"=>\"form-control\",\"require\"=>0)); ?>
            </div>";
                $ok=true;
            }
        }
        if(!$ok){
            if ($row["data_type"] == 'text') {
                $string .= "\n\t    <div class=\"form-group\">
            <label for=\"" . $row["column_name"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea>
        </div>";
            } else {
                $string .= "\n\t    <div class=\"form-group\">
            <label for=\"" . $row["data_type"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" />
        </div>";
            }
        }
    }
    else {
        if ($row["data_type"] == 'text') {
            $string .= "\n\t    <div class=\"form-group\">
            <label for=\"" . $row["column_name"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea>
        </div>";
        } else {
            $string .= "\n\t    <div class=\"form-group\">
            <label for=\"" . $row["data_type"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" />
        </div>";
        }
    }
}

$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "\n\t</form>
    ";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>