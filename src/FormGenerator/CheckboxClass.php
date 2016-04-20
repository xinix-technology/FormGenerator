<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Checkbox;
use \stdClass;

class CheckboxClass extends Component{
		
	public function render($data,$default){
		$data->type = 'type="'.$data->type.'"';
		$data->name = $data->name.'[]';
		$this->_data->name = null;
		$this->_data->value = null;
		$this->_data->placeholder = null;
		
		$templateObj = new Checkbox();
		$template = $templateObj->template();
		$temp = '';
		$result = '';
		foreach($data->checkbox as $each){
			if(isset($each->value)&&$each->value!=null){
				$this->_data->value = $each->value;
			}
			$temp = $this->renderBasic($data,'',$template);
			$temp = $this->renderInput($temp);
			$temp = $each->text.$temp;
			

			if(isset($each->checked)&&$each->checked==true){
				$value = 'checked';
				$temp = str_replace('[checked]',$value,$temp);
			}else{
				$value = '';
				$temp = str_replace(' [checked]',$value,$temp);
			}
			$result = $result.$temp;
		}
		$wrapper = $templateObj->additionalTag();
		$result = str_replace('[content]',$result,$wrapper);		
		return $result;
	}
}