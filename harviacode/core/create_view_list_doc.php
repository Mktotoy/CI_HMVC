<?php 

$string = "
        <h2>".ucfirst($table_name)." List</h2>
        <table class=\"word-table\" style=\"margin-bottom: 10px\">
            <tr>
                <th>No</th>";
foreach ($all as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t
            </tr>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t      <td><?php echo ++\$start ?></td>";

foreach ($all as $row) {
    $string .= "\n\t\t      <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}

$string .=  "\t
                </tr>
                <?php
            }
            ?>
        </table>
   ";


$hasil_view_doc = createFile($string, $target."views/" . $c_url . "/" . $v_doc_file);

?>