<?php
error_reporting(0);
require_once 'core/harviacode.php';
require_once 'core/helper.php';
require_once 'core/process.php';
?>
<!doctype html>
<html>
    <head>
        <title>Harviacode Codeigniter CRUD Generator</title>
        <link rel="stylesheet" href="core/bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-8">
                <form action="index.php" method="POST">

                    <div class="form-group">
                        <h3>Select Table - <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] ?>"> Refresh tables</a></h3>
                            <div class="row">
                                <?php
                                    $table_list = $hc->table_list();
                                    $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                    foreach ($table_list as $table):       ?>
                                    <div class="col-sm-6">
                                        <input class type="checkbox" name="table_name[]" value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'checked="checked"' : ''; ?>><?php echo $table['table_name'] ?>
                                    </div>
                                    <?php endforeach; ?>
                            </div>
                    </div>

                    <div class="form-group">
                        <h3> Select Table Show</h3>
                        <div class="row">
                            <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                            <div class="col-md-6">
                                <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                    <label>
                                        <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                                        Reguler Table
                                    </label>
                                </div>                            
                            </div>
                            <div class="col-md-6">
                                <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                    <label>
                                        <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                                        Datatables
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <h3>Select Options</h3>
                        <div class="checkbox col-md-3">
                            <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                            <label>
                                <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                                Export Excel
                            </label>
                        </div>

                        <div class="checkbox col-md-3">
                            <?php $api_table = isset($_POST['api_table']) ? $_POST['api_table'] : ''; ?>
                            <label>
                                <input type="checkbox" name="api_table" value="1" <?php echo $api_table == '1' ? 'checked' : '' ?>>
                                API Tab
                            </label>
                        </div>

                        <div class="checkbox col-md-3">
                            <?php $star = isset($_POST['star']) ? $_POST['star'] : ''; ?>
                            <label>
                                <input type="checkbox" name="star" value="1" <?php echo $star == '1' ? 'checked' : '' ?>>
                                Star Model ( select Fact Table )
                            </label>
                        </div>

                        <div class="checkbox col-md-3">
                            <?php $export_word = isset($_POST['export_word']) ? $_POST['export_word'] : ''; ?>
                            <label>
                                <input type="checkbox" name="export_word" value="1" <?php echo $export_word == '1' ? 'checked' : '' ?>>
                                Export Word
                            </label>
                        </div>
                    </div>    

                    <!--                    <div class="form-group">
                                            <div class="checkbox  <?php // echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : 'disabled';   ?>">
                    <?php // $export_pdf = isset($_POST['export_pdf']) ? $_POST['export_pdf'] : ''; ?>
                                                <label>
                                                    <input type="checkbox" name="export_pdf" value="1" <?php // echo $export_pdf == '1' ? 'checked' : ''   ?>
                    <?php // echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : 'disabled'; ?>>
                                                    Export PDF
                                                </label>
                    <?php // echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : '<small class="text-danger">mpdf required, download <a href="http://harviacode.com">here</a></small>'; ?>
                                            </div>
                                        </div>-->

                    <div class="form-group row">
                        <h3>Select Names</h3>
                        <div class="col-md-6">
                            <label>Custom Controller prefix name</label>
                            <input type="text" id="controller_prefix" name="controller_prefix" value="<?php echo isset($_POST['controller_prefix']) ? $_POST['controller_prefix'] : '' ?>" class="form-control" placeholder="Controller Name" />
                        </div>
                        <div class="col-md-6">
                            <label>Custom Model prefix name</label>
                            <input type="text" id="model_prefix" name="model_prefix" value="<?php echo isset($_POST['model_prefix']) ? $_POST['model_prefix'] : '' ?>" class="form-control" placeholder="Model Name" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <h3>Select Generation type</h3>
                        <div class="col-md-6">
                            MVC : <input type="radio" id="gen_type" name="gen_type" value="MVC" />
                        </div>
                        <div class="col-md-6">
                            HMVC : <input type="radio" id="gen_type" name="gen_type" value="HMVC" />
                            <input type="text" id="module_name" name="module_name" value="" class="form-control" placeholder="Module Name (HMVC only)" />

                        </div>
                    </div>
                    <!--<input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />-->
                    <input type="submit" value="Generate selected" name="generateall" class="btn btn-success" onclick="javascript: return confirm('WARNING !! This will generate code for ALL TABLE and overwrite the existing files\
                    \nPlease double check before continue. Continue ?')" />
                    <a href="core/setting.php" class="btn btn-default">Setting</a>
                </form>
                <br>

                <?php
                foreach ($hasil as $h) {
                    echo '<p>'; // . $h . '</p>';
                    print_r($h);
                    echo '</p>';
                }
                ?>
            </div>
            <div class="col-md-4">
                <h3 style="margin-top: 0px">Codeigniter CRUD Generator 1.3.1 by <a target="_blank" href="http://harviacode.com">harviacode.com</a></h3>
                <p><strong>About :</strong></p>
                <p>
                    Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your
                    writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel, and export to word. 
                    This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.
                </p>
                <small>* generate textarea and text input only</small>
                <p>
                    Please visit and like <a target="_blank" href="http://harviacode.com"><b>harviacode.com</b></a> for more info and PHP tutorials.
                </p>
                <p><strong>How to use this CRUD Generator :</strong></p>
                <ul>
                    <li>Simply put 'harviacode' folder, 'asset' folder and .htaccess file into your project root folder.</li>
                    <li>Open http://localhost/yourprojectname/harviacode.</li>
                    <li>Select table and push generate button.</li>
                </ul>
                <p><strong>Important :</strong></p>
                <ul>
                    <li>On application/config/autoload.php, load database library, session library and url helper</li>
                    <li>On application/config/config.php, set :</b>.
                        <ul>
                            <li>$config['base_url'] = 'http://localhost/yourprojectname'</li>
                            <li>$config['index_page'] = ''</li>
                            <li>$config['url_suffix'] = '.html'</li>
                            <li>$config['encryption_key'] = 'randomstring'</li>

                        </ul>

                    </li>
                    <li>On application/config/database.php, set hostname, username, password and database.</li>
                </ul>
                <br>
                <p><strong>Thanks for Support Me</strong></p>
                <p>Buy me a cup of coffee :)</p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="52D85QFXT57KN">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                <br>
                <p><strong>Update</strong></p>

                <ul>
                    <li>V.1.3.1 - 05 April 2016
                        <ul>
                            <li>Put view files into folder</li>
                        </ul>
                    </li>
                    <li>V.1.3 - 09 December 2015
                        <ul>
                            <li>Zero Config for database connection</li>
                            <li>Fix bug searching</li>
                            <li>Fix field name label</li>
                            <li>Add select table from database</li>
                            <li>Add generate all table</li>
                            <li>Select target folder from setting menu</li>
                            <li>Remove support for Codeigniter 2</li>
                        </ul>
                    </li>
                    <li>V.1.2 - 25 June 2015
                        <ul>
                            <li>Add custom target folder</li>
                            <li>Add export to excel</li>
                            <li>Add export to word</li>
                        </ul>
                    </li>
                    <li>V.1.1 - 21 May 2015
                        <ul>
                            <li>Add custom controller name and custom model name</li>
                            <li>Add client side datatables</li>
                        </ul>
                    </li>
                </ul>

                <p><strong>&COPY; 2015 <a target="_blank" href="http://harviacode.com">harviacode.com</a></strong></p>
            </div>
        </div>
        <script type="text/javascript">
            function capitalize(s) {
                return s && s[0].toUpperCase() + s.slice(1);
            }

            function setname() {
                var table_name = document.getElementById('table_name').value.toLowerCase();
                if (table_name != '') {
                    document.getElementById('controller').value = capitalize(table_name);
                    document.getElementById('model').value = capitalize(table_name) + '_model';
                } else {
                    document.getElementById('controller').value = '';
                    document.getElementById('model').value = '';
                }
            }
        </script>
    </body>
</html>
