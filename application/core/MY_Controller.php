<?php

/**
 * MY_Controller
 * 
 * @property CI_Loader $load
 * @property MY_Input $input
 * @property MY_Session $session
 * @property CI_Config $config
 * @property MY_Form_validation $form_validation
 * @property CI_URI $uri
 * @property CI_Router $router
 */
class MY_Controller extends CI_Controller
{

    /**
     * model
     *
     * @param  string $name
     * @return MY_Model
     */
    public function model($name)
    {
        $name = $name . '_model';

        if (!isset($this->{$name})) {
            $this->load->model($name);
        }

        return $this->{$name};
    }

    /**
     * loadView
     * 
     * @param array $data
     * @param string $template
     * @return void
     */
    protected function loadView(array $data = array(), $template = null)
    {
        $this->load->library('user_agent');

        $tplPrefix = '';

        if ($this->agent->is_mobile()) {
            $tplPrefix = 'sp/';
        }

        if ($template === null) {
            $class = $this->router->fetch_class();
            $method = $this->router->fetch_method();
            $template = "{$class}/{$method}";
        }

        $target = $tplPrefix . $template;

        $this->load->view($target, $data);
    }

}
