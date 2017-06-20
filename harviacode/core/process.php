<?php

$hasil = array();

if (isset($_POST['generate']))
{
    // get form data
    $table_name = safe($_POST['table_name']);
    $jenis_tabel = safe($_POST['jenis_tabel']);
    $export_excel = safe($_POST['export_excel']);
    $export_word = safe($_POST['export_word']);
    $export_pdf = safe($_POST['export_pdf']);
    $controller = safe($_POST['controller']);
    $star = safe($_POST['star']);
    $api_table = safe($_POST['api_table']);
    $model = safe($_POST['model']);

    if ($table_name <> '')
    {
        // set data
        $table_name = $table_name;
        $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
        $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        $v_doc = $table_name . "_doc";
        $v_pdf = $table_name . "_pdf";

        // url
        $c_url = strtolower($c);

        // filename
        $c_file = $c . '.php';
        $m_file = $m . '.php';
        $v_list_file = $v_list . '.php';
        $v_read_file = $v_read . '.php';
        $v_form_file = $v_form . '.php';
        $v_doc_file = $v_doc . '.php';
        $v_pdf_file = $v_pdf . '.php';

        // read setting
        $get_setting = readJSON('core/settingjson.cfg');
        $target = $get_setting->target;

        if (!file_exists($target . "views/" . $c_url))
        {
            mkdir($target . "views/" . $c_url, 0777, true);
        }

        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);
        //var_dump(print_r($api_table));
        // generate
        include 'core/create_config_pagination.php';
        if($api_table)
            $control= 'core/create_controller_api.php';
        else
            $control='core/create_controller.php';

        include $control;

        include 'core/create_model.php';
        $jenis_tabel == 'reguler_table' ? include 'core/create_view_list.php' : include 'core/create_view_list_datatables.php';
        include 'core/create_view_form.php';
        include 'core/create_view_read.php';

        $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
        $export_word == 1 ? include 'core/create_view_list_doc.php' : '';
        $export_pdf == 1 ? include 'core/create_pdf_library.php' : '';
        $export_pdf == 1 ? include 'core/create_view_list_pdf.php' : '';

        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_read;
        $hasil[] = $hasil_view_doc;
        $hasil[] = $hasil_view_pdf;
        $hasil[] = $hasil_config_pagination;
        $hasil[] = $hasil_exportexcel;
        $hasil[] = $hasil_pdf;
    } else
    {
        $hasil[] = 'No table selected.';
    }
}

if (isset($_POST['generateall']))
{
    $table_name= array();
    foreach($_POST['table_name'] as $line)
        array_push($table_name,array('table_name'=>$line));

    $jenis_tabel = safe($_POST['jenis_tabel']);
    $export_excel = safe($_POST['export_excel']);
    $export_word = safe($_POST['export_word']);
    $export_pdf = safe($_POST['export_pdf']);
    $star = safe($_POST['star']);
    $api_table = safe($_POST['api_table']);

    $controller_prefix = safe($_POST['controller_prefix']);
    $model_prefix = safe($_POST['model_prefix']);

    $star= $star?$table_name:null;

    //add star choice with only
    if($star <>null) {
        $table_list = $hc->all_foreign_keys($star);
        $table_list[]=array('table_name' => $star);
    }
    else
        $table_list = $table_name;
    $hasil[]=$table_list;

    foreach ($table_list as $row) {

        $table_name = $row['table_name'];
        $c = ucfirst($table_name);
        $m = ucfirst($table_name) . '_model';

        $c = $controller_prefix <> '' ? ucfirst($controller_prefix.$table_name) : ucfirst($table_name);
        $m = $model_prefix <> '' ? ucfirst($model_prefix.$table_name. "_model")  : ucfirst($table_name) . '_model';
        
        
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        $v_doc = $table_name . "_doc";
        $v_pdf = $table_name . "_pdf";

        // url
        $c_url = strtolower($c);

        // filename
        $c_file = $c . '.php';
        $m_file = $m . '.php';
        $v_list_file = $v_list . '.php';
        $v_read_file = $v_read . '.php';
        $v_form_file = $v_form . '.php';
        $v_doc_file = $v_doc . '.php';
        $v_pdf_file = $v_pdf . '.php';

        // read setting
        $get_setting = readJSON('core/settingjson.cfg');
        $gen_type = safe($_POST['gen_type']);
        if($gen_type=="HMVC") {
            $module_name = safe($_POST['module_name']);
            $target = $get_setting->target_module.$module_name;
        }
        else{
            $target = $get_setting->target;
        }

        if (!file_exists($target . "views/" . $c_url))
        {
            mkdir($target . "views/" . $c_url, 0777, true);
        }

        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);

        // generate
        include 'core/create_config_pagination.php';
        if($api_table)
            $control= 'core/create_controller_api.php';
        else
            $control='core/create_controller.php';

        include $control;
        include 'core/create_model.php';
        $jenis_tabel == 'reguler_table' ? include 'core/create_view_list.php' : include 'core/create_view_list_datatables.php';
        include 'core/create_view_form.php';
        include 'core/create_view_read.php';

        $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
        $export_word == 1 ? include 'core/create_view_list_doc.php' : '';
        $export_pdf == 1 ? include 'core/create_pdf_library.php' : '';
        $export_pdf == 1 ? include 'core/create_view_list_pdf.php' : '';

        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_read;
        $hasil[] = $hasil_view_doc;
    }

    $hasil[] = $hasil_config_pagination;
    $hasil[] = $hasil_exportexcel;
    $hasil[] = $hasil_pdf;
}
?>