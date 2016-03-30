<?php

	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach ($unicode as $khongdau => $codau) {
			$arr = explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}

	function changeTitle($str){
		$str = trim($str);
		if($str == "") return "";
		$str = str_replace('"','',$str);
		$str = str_replace("'",'',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		//MB_CASE_LOWER - MB_CASE_TITLE - MB_CASE_UPPER
		$str = str_replace(' ','-',$str);
		return $str;
	}

	function renderCategoryForSelect($data,$parent = 0, $str = '',$select = 0){
		foreach ($data as $key => $value) {
			$id 	= $value['id'];
			$name 	= $value['name'];
			if($value['parent_id'] == $parent){
				if($select != 0 && $id == $select){
					echo "<option value='$id' selected='selected'>$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}
				renderCategoryForSelect($data,$id, $str.' --- ',$select);	
			}
		}
	}

	function renderMenu($menuData, $parent = 0){
        foreach ($menuData as $key => $value) {
            if($value['parent_id'] == $parent){
            	if($value['parent_id'] == 0){
            	echo '<li class="has-sub"><a href="' . $value['link'] . '"><span><i class="demo-icon">&#' . $value['icon'] . ';</i>' . $value['name'] . '</span></a>';
            	echo '<ul>';
            	renderMenu($menuData,$value['id']); 
            	echo '</ul>';
            	echo '</li>';
	            }else{
	            	echo '<li><a href="' . url($value['link']) . '"><span>' . $value['name'] . '</span></a></li>'; 	
	            }
            }
        }
    }

    class UnitType{
    	public $unitTypes = array(	'1' => 'viên',
    								'2' => 'vỉ',
    								'3' => 'gói',
    								'4' => 'lốc',
    								'5' => 'hộp',
    								'6' => 'thùng',
    								'7' => 'lọ',
    								'8' => 'chai',
    							  	'9' => 'cái');

    	public function renderUnitType(){
    		echo '<div id="btnUnitType" class="btn-group col-lg-12" style="padding:0px;" role="group" aria-label="...">';
    			foreach ($this->unitTypes as $key => $value) {
    				echo '<button type="button" class="btn btn-default" value="' .$key. '">' .$value. '</button>';
    			}
            echo '</div>';
    	}

    	public function getUnitTypeName($inputKey){
    		foreach ($this->unitTypes as $key => $value) {
    			if($key == $inputKey){
    				return $value;
    			}
    		}
    	}
    }
?>