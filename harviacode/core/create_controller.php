<?php

$string = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class " . $c . " extends CI_Controller
{
    public \$data;
    function __construct()
    {
        parent::__construct();
        \$this->data=array();
        \$this->load->model('$m');
        \$this->load->library('form_validation');
    }";




if ($jenis_tabel == 'reguler_table') {
    
$string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));
        
        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index.html';
            \$config['first_url'] = base_url() . '$c_url/index.html';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$this->data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );";
    if($star === $c) $string .="\$this->load_foreignkeys_reference();";
    $string.="\$this->template->view('$c_url/$v_list', \$this->data);
    }";

} else {
    
$string .="\n\n    public function index()
    {
        \$$c_url = \$this->" . $m . "->get_all();

        \$this->data = array(
            '" . $c_url . "_data' => \$$c_url
        );";
    if($star === $c) $string .="\$this->load_foreignkeys_reference();";
    $string .="
        \$this->template->ajouter_js('js/datatables_init');
        \$this->template->view('$c_url/$v_list', \$this->data);
    }";

}
    
$string .= "\n\n    public function read() 
    {
            \$ids = array(";
foreach ($pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->get('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );
        \$row = \$this->".$m."->get_by_id(\$ids);
        if (\$row) {
            \$this->data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t    );";
if($star === $c) $string .="\$this->load_foreignkeys_reference();";
$string.="
            \$this->template->view('$c_url/$v_read', \$this->data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }

    public function create() 
    {
        \$this->data = array(
            'button' => 'Create',
            'action' => site_url('$c_url/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t);";
if($star === $c) $string .="\$this->load_foreignkeys_reference();";
$string .="
        \$this->template->view('$c_url/$v_form', \$this->data);
    }
    
    public function create_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$this->data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->".$m."->insert(\$this->data);
            \$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update() 
    {
             \$ids = array(";
foreach ($pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->get('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );
        \$row = \$this->".$m."->get_by_id(\$ids);

        if (\$row) {
            \$this->data = array(
                'button' => 'Update',
                'action' => site_url('$c_url/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";
}

$string .= "\n\t    );";
if($star === $c) $string .="\$this->load_foreignkeys_reference();";
$string .="
            \$this->template->view('$c_url/$v_form', \$this->data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$this->data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}    
$string .= "\n\t    );

 \$ids = array(";
foreach ($pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->".$m."->update(\$ids, \$this->data);
            \$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete() 
    {
        
       \$ids = array(";
foreach ($pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->get('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );
        \$row = \$this->".$m."->get_by_id(\$ids);
        if (\$row) {
            \$this->".$m."->delete(\$ids);
            \$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }

    public function _rules() 
    {";
foreach ($all as $row) {
    $int = $row3['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
    $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
}    

$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$this->load->helper('exportexcel');
        \$namaFile = \"$table_name.xls\";
        \$judul = \"$table_name\";
        \$tablehead = 0;
        \$tablebody = 1;
        \$nourut = 1;
        //penulisan header
        header(\"Pragma: public\");
        header(\"Expires: 0\");
        header(\"Cache-Control: must-revalidate, post-check=0,pre-check=0\");
        header(\"Content-Type: application/force-download\");
        header(\"Content-Type: application/octet-stream\");
        header(\"Content-Type: application/download\");
        header(\"Content-Disposition: attachment;filename=\" . \$namaFile . \"\");
        header(\"Content-Transfer-Encoding: binary \");

        xlsBOF();

        \$kolomhead = 0;
        xlsWriteLabel(\$tablehead, \$kolomhead++, \"No\");";
foreach ($all as $row) {
        $column_name = label($row['column_name']);
        $string .= "\n\txlsWriteLabel(\$tablehead, \$kolomhead++, \"$column_name\");";
}
$string .= "\n\n\tforeach (\$this->" . $m . "->get_all() as \$this->data) {
            \$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber(\$tablebody, \$kolombody++, \$nourut);";
foreach ($all as $row) {
        $column_name = $row['column_name'];
        $xlsWrite = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? 'xlsWriteNumber' : 'xlsWriteLabel';
        $string .= "\n\t    " . $xlsWrite . "(\$tablebody, \$kolombody++, \$this->data->$column_name);";
}
$string .= "\n\n\t    \$tablebody++;
            \$nourut++;
        }

        xlsEOF();
        exit();
    }";
}
if($star === $c){
    $string .= "\n\n    function load_foreignkeys_reference()
    {";
    foreach ($table_list as $row) {
        if($row['table_name'] != $c)
            $string.= "\$this->load->model('".$row['table_name']."_model');
        \$this->data['".$row['table_name']."']=array();
        \$row=\$this->".$row['table_name']."_model->get_all_array();
            foreach(\$row as \$elem){
                \$this->data['".$row['table_name']."'][\$elem['".$row['referenced_column_name']."']]=\$elem['".$row['referenced_column_name']."'];
            }	
            ";
    }
    $string.="
    }
    ";
}
if ($export_word == '1') {
    $string .= "\n\n    public function word()
    {
        header(\"Content-type: application/vnd.ms-word\");
        header(\"Content-Disposition: attachment;Filename=$table_name.doc\");

        \$this->data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        \$this->template->view('" . $c_url ."/". $v_doc . "',\$this->data);
    }";
}

if ($export_pdf == '1') {
    $string .= "\n\n    function pdf()
    {
        \$this->data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        \$html = \$this->load->view('" . $c_url ."/". $v_pdf . "', \$this->data, true);
        \$this->load->library('pdf');
        \$pdf = \$this->pdf->load();
        \$pdf->WriteHTML(\$html);
        \$pdf->Output('" . $table_name . ".pdf', 'D'); 
    }";
}

$string .= "\n\n}\n\n/* End of file $c_file */
/* Location: ./application/controllers/$c_file */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator ".date('Y-m-d H:i:s')." */
/* http://harviacode.com */";




$hasil_controller = createFile($string, $target . "controllers/" . $c_file);

?>