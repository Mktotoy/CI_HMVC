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


        //$this->CI->template->var['theme']='default';
        $this->CI->template->var['icon']=img_url('logo.png');
        $this->CI->template->var['logo'] = img_url('logo.png');
        //	Le titre est composé du nom de la méthode et du nom du contréleur
        //	La fonction ucfirst permet d'ajouter une majuscule
        $this->CI->template->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

        // Initialiser les feuilles de style
        // Initialiser les feuilles de style
        $this->CI->template->ajouter_css('bootstrap/css/bootstrap.min');
        $this->CI->template->ajouter_css('css/style');
        $this->CI->template->ajouter_css('font-awesome-4.7.0/css/font-awesome.min');
        $this->CI->template->ajouter_css('datatables/dataTables.bootstrap');
        $this->CI->template->ajouter_css('datatables/full_dataTables.min');

        $this->CI->load->model('admin/Categorie_model','Categorie_model');
        $categories = $this->CI->Categorie_model->get_all();

        $this->CI->template->var['left_navigation'] = '
                                <li><a><i class="fa fa-windows"></i> Par Chaines <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">';
        foreach ($categories as $cat)
            $this->CI->template->var['left_navigation'] .='<li><a href="'.site_url("Plateform/theme_channels").'/'.$cat->name.'">'.$cat->icon.' '.$cat->name.'</a></li>';
        $this->CI->template->var['left_navigation'] .='</ul>
                                </li>
                                    ';
        
        if(isset($this->CI->session->userdata('user')['role']) && $this->CI->session->userdata('user')['role'] == 2){
            $this->CI->template->var['left_navigation'] .= '
            <li><a><i class="fa fa-wrench"></i> Admin <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="'.site_url("Createur").'"><i class="fa fa-table"></i>Createur</a></li>
                    <li><a href="'.site_url("Moderation").'"><i class="fa fa-table"></i>Moderation</a></li>  
                    <li><a href="'.site_url("Categorie").'"><i class="fa fa-table"></i>Categorie</a></li>  
                    <li><a href="'.site_url("Question").'"><i class="fa fa-table"></i>Question</a></li>  
                    <li><a href="'.site_url("Question_line").'"><i class="fa fa-table"></i>Question_line</a></li>  
                    <li><a href="'.site_url("Video_categorie").'"><i class="fa fa-table"></i>Video_categorie</a></li>  
                    <li><a href="'.site_url("Videos").'"><i class="fa fa-table"></i>Videos</a></li>  
                    <li><a href="'.site_url("Channel").'"><i class="fa fa-table"></i>Channel</a></li>  
                    
                    <li><a href="'.site_url("Badge").'"><i class="fa fa-table"></i>Badge</a></li>  
                                    
                                    
                </ul>
            </li> ';

            $this->CI->template->var['top_navigation'] = '
                            <li><a href="'.site_url('User/profile').'"> Profile</a></li>                             
                            <li><a href="">Help</a></li>
                            <li><a href="'.site_url('User/logout').'" <i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                           ';
        }


       /* $this->CI->template->var['top_navigation'] = '
                            <li><a href="'.site_url('User/profile').'"> Profile</a></li>
                                <li>
                                    <a href="">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="">Help</a></li>
                                <li><a href="'.site_url('User/logout').'" <i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                           ';
        /*$this->CI->load->library('translate');
        $this->CI->load->library('navigation');
        $this->CI->load->model('CRUD_Usergroupnavigation_model');
        //$this->var['left_navigation'] = $this->CI->navigation->generateNav_fromName('LeftAdmin');

        if(!empty($this->CI->session->userdata('usergroup'))){
            $res=$this->CI->CRU D_Usergroupnavigation_model->get_by_col_array('IDUserGroup',$this->CI->session->userdata('usergroup'));

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
        $this->CI->template->ajouter_js('js/highcharts');
        $this->CI->template->ajouter_js('js/myscript');
        $this->CI->template->ajouter_js('datatables/full_dataTables.min');
        $this->CI->template->ajouter_js('js/ajax_functions');




        $this->CI->template->add_subscript("");
        //	Nous initialisons la variable $charset avec la méme valeur que
        //	la clé de configuration initialisée dans le fichier config.php
        $this->CI->template->var['charset'] = $this->CI->config->item('charset');

    }
}


