<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Checkbox;
use \stdClass;

class RadioClass extends Component{
		
	public function render($data,$default){
		$data->type = 'type="'.$data->type.'"';
		$this->_data->name = null;
		$this->_data->value = null;
		$this->_data->placeholder = null;
		$templateObj = new Checkbox();
		$template = $templateObj->template();
		$temp = '';
		$result = '';
		foreach($data->radio as $each){
			if(isset($each->value)&&$each->value!=null){
				$this->_data->value = $each->value;
			}
			$temp = $this->renderBasic($data,'',$template);
			$temp = $this->renderInput($temp);
			$temp = $temp.$each->text;
			if(isset($each->checked)&&$each->checked==true){
				$value = 'checked';
				$temp = str_replace('[checked]',$value,$temp);
			}else{
				$value = '';
				$temp = str_replace(' [checked]',$value,$temp);
			}
			$result = $result.$temp;
		}		
		return $result;
	}
}