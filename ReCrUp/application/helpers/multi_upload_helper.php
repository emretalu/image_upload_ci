<?php

	function imageResize($link){
	    $CI = & get_instance();
	    $CI -> load -> library('multi_upload');
        
		$CI -> multi_upload -> multi_upload($link);
        
        if ($CI -> multi_upload -> uploaded) {
            $rand = uniqid(true);
            $CI -> multi_upload->file_new_name_body = 'thumb_'.$rand;
            
            if($CI -> multi_upload->image_src_x > 70 ) {
                $CI -> multi_upload->image_resize = true;
                $CI -> multi_upload->image_ratio_y = true;
                $CI -> multi_upload->image_x = 70;
                
                $CI -> multi_upload->allowed = array('image/*');
                        
                $CI -> multi_upload->Process("upload/");
                
                if($CI -> multi_upload->processed){                    
                    return 1;
                }
                else{
                    return 2;
                }
            }
            else{
                return 3;
            }
        }
	}

	function imageCrop($x,$y,$x2,$y2,$w,$h,$resimlink){
	    
        $CI = & get_instance();
        $CI -> load -> library('multi_upload');
    
        if($w < 70 || $h < 70) {
            echo 0;
        }
        else{
            $CI -> multi_upload -> multi_upload($resimlink);

            if ($CI -> multi_upload ->uploaded) {
                $rand = uniqid(true);
                $CI -> multi_upload->file_new_name_body = 'crop_'.$rand;
                                  
                $resimWidth = $CI -> multi_upload->image_src_x - $x2;
                $resimHeight = $CI -> multi_upload->image_src_y - $y2;
                
                $CI -> multi_upload->image_crop = "{$y} {$resimWidth} {$resimHeight} {$x}";
                
                $CI -> multi_upload->allowed = array('image/*');
                
                $CI -> multi_upload->Process("upload/");

                if($CI -> multi_upload->processed){
                    $resimlink2 = "upload/crop_" . $rand . "." . $CI -> multi_upload -> image_src_type;
					echo imageResize($resimlink2);					
                }
                else{
                    echo 2;
                }
            }
            else{
                echo 3;
            }
        }
		exit;
	}

?>