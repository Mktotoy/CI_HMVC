<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Template
{
    private $CI;
    public $var = array();
    public $theme;

    /*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

    public function __construct()
    {
        $this->CI = get_instance();
        $this->theme = 'gentelella';
        $this->var['contenu'] = "";
    }

    /*
    |===============================================================================
    | Méthodes pour charger les vues
    |	. view
    |	. views
    |===============================================================================
    */

    public function view($name, $data = array())
    {
        $this->var['contenu'] .= $this->CI->load->view($name, $data, true);
        $this->CI->load->view('themes/'. $this->theme.'/template', $this->var);
    }

    public function views($name, $data = array())
    {
        $this->var['contenu'] .= $this->CI->load->view($name, $data, true);
        return $this;
    }
    /*
    |===============================================================================
    | Méthodes pour modifier les variables envoyées au layout
    |	. set_titre
    |	. set_charset
    |===============================================================================
    */
    public function set_titre($titre)
    {
        if(is_string($titre) AND !empty($titre))
        {
            $this->var['titre'] = $titre;
            return true;
        }
        return false;
    }


    public function set_logo($logo){
        if(is_string($logo) AND !empty($logo) AND file_exists('./assets/img/' . $logo))
        {
            $this->var['$logo'] = $logo;
            return true;
        }
        return false;
    }
    public function add_subscript($subscript){
        if(is_string($subscript) AND !empty($subscript))
        {
            $this->var['subscript'] = $subscript;
            return true;
        }
        return false;
    }
    public function set_charset($charset)
    {
        if(is_string($charset) AND !empty($charset))
        {
            $this->var['charset'] = $charset;
            return true;
        }
        return false;
    }

    public function set_theme($theme)
    {
        if(is_string($theme) AND !empty($theme) AND file_exists('./application/views/themes/' . $theme . '/template.php'))
        {
            $this->theme = $theme;
            return true;
        }
        return false;
    }

    /*
|===============================================================================
| Méthodes pour ajouter des feuilles de CSS et de JavaScript
|	. ajouter_css
|	. ajouter_js
|===============================================================================
*/
    public function ajouter_css($nom)
    {
        if(is_string($nom) AND !empty($nom) AND file_exists('./assets/' . $nom . '.css'))
        {
            $this->var['css'][] = css_url($nom);
            return true;
        }
        return false;
    }

    public function ajouter_js($nom)
    {
        if(is_string($nom) AND !empty($nom) AND file_exists('./assets/' . $nom . '.js'))
        {
            $this->var['js'][] = js_url($nom);
            return true;
        }
        return false;
    }
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */