<?php 

class MY_Controller extends CI_Controller
{
	protected $data = array();
	protected $controller_name;
	protected $action_name;
	protected $layout;
	protected $nolayout;
	protected $page_title = "";
	protected $load_vertical_menu = false;
	
	public function __construct() { 
		parent::__construct();
		 
		$_SESSION['icno'] = '820519115343';
		$_SESSION['skt_tahun'] = '2015';
		$_SESSION['STAFF'] = 'Abdul Rahim Bin Abu Bakar';
		
		$this->load_defaults();
	}
	
	protected function load_defaults() {

		$this->nolayout = false;
		$this->layout = "layout.php";
		
	
		// $this->controller_name = $this->router->fetch_directory() . $this->router->fetch_class();
		$this->controller_name = $this->router->fetch_class();
		$this->action_name = $this->router->fetch_method();



	}
	
	protected function load_menu($menu_file, $param=array())
	{
		$this->load_vertical_menu = $this->load->view($menu_file, $param, true);
	}
	
	protected function render($data = array(), $view = "", $return = false) {
		//set variable
		$data["page_title"] = $this->page_title;
		$data["left_menu"] = $this->load_vertical_menu;
		//
		$action_name = $this->router->fetch_method(); 
		
			
		$view_ext = ".tpl.php";
		
		if ($this->nolayout) {	
			
			if ($view == "")
			{ 
				$data["x_main_content"] = $this->controller_name."/".$action_name.$view_ext;
			} 
			else
			{
				// $data["x_main_content"] = $view.$view_ext; 
				
				$data["x_main_content"] = $view;
			}

		
			$this->load->view('layouts/nolayout.php', $data);
		}
		else
		{ 
			$data["x_main_content"] = $action_name.$view_ext; 
			
			$data["menu"] = "menu.tpl.php";
			
			if ($view == "")
			{
				$data["x_main_content"] = $this->controller_name."/".$action_name.$view_ext;
			} 
			else
			{
				//$data["x_main_content"] = $view.$view_ext;
				$data["x_main_content"] = $view;
			}
		
			$this->load->view($this->layout, $data);
		}
		
	}
	
	function disable_layout()
	{
		$this->layout = "nolayout.php";
	}
	
	
}