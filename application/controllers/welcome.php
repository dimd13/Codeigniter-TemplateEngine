<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $data = array();
                $data['sample_var'] = 'SAMPLE VAR';
                $data['true_var'] = TRUE;
		$data['list'][] = array('name' => 'John', 'age' => 41);
                $data['list'][] = array('name' => 'Andy', 'age' => 17);
                $data['list'][] = array('name' => 'Dany', 'age' => 28);
		$this->template->parse_view('welcome_message', $data);
//                $this->load->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */