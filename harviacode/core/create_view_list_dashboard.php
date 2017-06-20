<?php 

$string = "
       
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