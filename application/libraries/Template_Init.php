<?php

/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 27/10/2016
 * Time: 12:55
 */
class Template_Init
{
    private $CI;
    private $var = array();
    private $theme = 'default';

    /**
     * Template_Init constructor.
     */
    public function __construct()
    {
        $this->CI = get_instance();

        $this->var['contenu'] = '';
        $this->var['css'] = array();
        $this->var['js'] = array();


        $this->CI->template->var['theme']='default';
        $this->CI->template->var['icon']="";/*img_url('handling_logo.png');*/
        $this->CI->template->var['logo'] = ""; /*img_url('handling_logo.png');*/
        //	Le titre est composé du nom de la méthode et du nom du contréleur
        //	La fonction ucfirst permet d'ajouter une majuscule
        $this->CI->template->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

        // Initialiser les feuilles de style
        // Initialiser les feuilles de style
        $this->CI->template->ajouter_css('bootstrap/css/bootstrap.min');
        $this->CI->template->ajouter_css('css/template/metisMenu.min');
        $this->CI->template->ajouter_css('css/template/sbadmin2');
        $this->CI->template->ajouter_css('css/style');
        $this->CI->template->ajouter_css('css/font-awesome.min');
        $this->CI->template->ajouter_css('datatables/dataTables.bootstrap');

        /*$this->CI->load->library('translate');
        $this->CI->load->library('navigation');
        $this->CI->load->model('CRUD_Usergroupnavigation_model');
        //$this->var['left_navigation'] = $this->CI->navigation->generateNav_fromName('LeftAdmin');

        if(!empty($this->CI->session->userdata('usergroup'))){
            $res=$this->CI->CRUD_Usergroupnavigation_model->get_by_col_array('IDUserGroup',$this->CI->session->userdata('usergroup'));

            foreach($res as $line){
                if($line['Position'] == "top"){
                    $this->CI->navigation->loadNewConfig('navigation');
                    $this->CI->template->var['top_navigation'] = $this->CI->navigation->generateNav_fromID($line['MenuID']);
                }
                if($line['Position'] == "left"){
                    $this->CI->navigation->loadNewConfig('navigation_bootstrap');
                    $this->CI->template->var['left_navigation'] = $this->CI->navigation->generateNav_fromID($line['MenuID']);
                }
            }
        }
        else {
            $this->CI->navigation->loadNewConfig('navigation');
            $this->CI->template->var['top_navigation'] = $this->CI->navigation->generateNav_fromName('TopVisitor');
        }

        $current_page =  ($_SERVER['PHP_SELF']);
        $current_page_elements = explode("/",$current_page);

        $bool = false;
        $this->CI->load->model('CRUD_Ci_nav_inmenu_model');
        $this->CI->load->model('CRUD_Ci_nav_menus_model');
        $this->CI->load->model('CRUD_Ci_nav_items_model');


        if ((strcasecmp(end($current_page_elements),'index.php') == 0)||(strcasecmp(end($current_page_elements),'Connexion') == 0)||(strcasecmp(end($current_page_elements),'deconnexion') == 0)
            ||(strcasecmp(end($current_page_elements),'get_rox') == 0)||(strcasecmp(end($current_page_elements),'verifyInvoiceDate') == 0)||(strcasecmp(end($current_page_elements),'verifyContractID') == 0))
            $bool=true;

        if(!$bool) { // not a default page
            if (!empty($this->CI->session->userdata('usergroup')))
                $res = $this->CI->CRUD_Usergroupnavigation_model->get_by_col_array('IDUserGroup', $this->CI->session->userdata('usergroup'));
            else {
                $this->CI->load->model('CRUD_Usergroup_model');
                $a = $this->CI->CRUD_Usergroup_model->get_by_col_array('Libelle', 'Visitor');
                $res = $this->CI->CRUD_Usergroupnavigation_model->get_by_col_array('IDUserGroup', $a[0]['IDUserGroup']);
            }

            foreach ($res as $menu) {
                $res2 = $this->CI->CRUD_Ci_nav_inmenu_model->get_by_col_array('MenuID', $menu['MenuID']);
                foreach ($res2 as $inmenu) {
                    $res3 = $this->CI->CRUD_Ci_nav_items_model->get_by_col_array('ItemID', $inmenu['ItemID']);
                    foreach ($res3 as $item) {
                        foreach ($current_page_elements as $elemcmp) {
                            $citem_link_expl=explode('/',$item['ItemLink']);
                            if ((strcasecmp($citem_link_expl[0], $elemcmp) == 0)||(strcasecmp($citem_link_expl[0].'.html', $elemcmp) == 0))
                                $bool = true;
                        }
                        $res4 = $this->CI->CRUD_Ci_nav_items_model->get_by_col_array('ParentItem', $item['ItemID']); // watch items children
                        foreach ($res4 as $childitems){
                            foreach ($current_page_elements as $elemcmp) {
                                $citem_link_expl=explode('/',$childitems['ItemLink']);
                                if ((strcasecmp($citem_link_expl[0], $elemcmp) == 0)||(strcasecmp($citem_link_expl[0].'.html', $elemcmp) == 0))
                                    $bool = true;
                            }
                        }
                    }
                }
            }
        }
        if(!$bool)
            redirect(base_url());*/


        // Initialiser feuiles javascript

        $this->CI->template->ajouter_js('js/jquery-1.11.2.min');
        $this->CI->template->ajouter_js('bootstrap/js/bootstrap.min');
        $this->CI->template->ajouter_js('js/metisMenu.min');
        $this->CI->template->ajouter_js('js/sb-admin-2');
        $this->CI->template->ajouter_js('js/highcharts');
        $this->CI->template->ajouter_js('js/myscript');
        $this->CI->template->ajouter_js('js/ajax_functions');




        $this->CI->template->add_subscript("");
        //	Nous initialisons la variable $charset avec la méme valeur que
        //	la clé de configuration initialisée dans le fichier config.php
        $this->CI->template->var['charset'] = $this->CI->config->item('charset');

    }
}