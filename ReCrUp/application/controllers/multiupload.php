<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Multiupload extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('multi_upload');
		$this -> load -> library('multi_upload');
	}

	public function index() {
		$this -> load -> view('multiupload/index');
	}	

	public function go_upload() {
		
		$resimler = array();

		foreach ($_FILES['resim'] as $k => $l) {
			foreach ($l as $i => $v) {
				if (!array_key_exists($i, $resimler))
					$resimler[$i] = array();
				$resimler[$i][$k] = $v;
			}
		}
		$i = 1;
		foreach ($resimler as $resim) {
			$this -> multi_upload -> multi_upload($resim);
			if ($this -> multi_upload -> uploaded) {
				$rand = uniqid(true);
				$this -> multi_upload -> file_new_name_body = 'original_' . $rand;

				if ($this -> multi_upload -> image_src_x < 300 || $this -> multi_upload -> image_src_y < 300) {
					echo "Hata";
				} else {
					if ($this -> multi_upload -> image_src_y > $this -> multi_upload -> image_src_x) {
						if ($this -> multi_upload -> image_src_x > 300) {
							$this -> multi_upload -> image_resize = true;
							$this -> multi_upload -> image_ratio_y = true;
							$this -> multi_upload -> image_x = 300;
						}
					} elseif ($this -> multi_upload -> image_src_x > $this -> multi_upload -> image_src_y) {
						if ($this -> multi_upload -> image_src_y > 300) {
							$this -> multi_upload -> image_resize = true;
							$this -> multi_upload -> image_ratio_x = true;
							$this -> multi_upload -> image_y = 300;
						}
					} else {
						if ($this -> multi_upload -> image_src_x > 300) {
							$this -> multi_upload -> image_resize = true;
							$this -> multi_upload -> image_ratio_y = true;
							$this -> multi_upload -> image_x = 300;
						}
					}

					$this -> multi_upload -> allowed = array('image/*');

					$this -> multi_upload -> Process("upload/");

					if ($this -> multi_upload -> processed) {
                        $data['resimlink'] = "upload/original_" . $rand . "." . $this -> multi_upload -> image_src_type;
						$data['x'] = $this -> multi_upload -> image_src_x;
						$data['y'] = $this -> multi_upload -> image_src_x;
						$data['i'] = $i;
						$this -> load -> view('multiupload/upload',$data);
					} else {
						echo $this -> multi_upload -> error;
					}
				}
			} else {
				echo $this -> multi_upload -> error;
			}
			$i++;
		}
	}

	public function upload() {
		$this -> load -> view('multiupload/upload');
	}

	public function go_crop() {
		$x = $this->input->post("x");
		$y = $this->input->post("y");
		$x2 = $this->input->post("x2");
		$y2 = $this->input->post("y2");
		$w = $this->input->post("w");
		$h = $this->input->post("h");
		$resimlink = $this->input->post("resimlink");
	
		imageCrop($x,$y,$x2,$y2,$w,$h,$resimlink);
	}


	public function crop() {
		$this -> load -> view('multiupload/crop');
	}

}
