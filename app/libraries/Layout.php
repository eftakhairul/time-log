<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    public $registry;
    public $layout;
    private $CI;


    function __construct($layout = "layouts/main")
    {
        $this->CI =& get_instance();
        $this->layout   = $layout;
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }

    function view($view, $data=null, $return=false)
    {
        $data['content_for_layout'] = $this->CI->load->view($view, $data, true);


        if($return){
            return $this->CI->load->view($this->layout, $data, true);
        } else {
            $this->CI->load->view($this->layout, $data, false);
        }
    }
}
