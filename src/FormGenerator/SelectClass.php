<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Select;
use FormGenerator\HtmlTemplate\Option;
use \stdClass;

class SelectClass extends Component{
		
	public function render($data,$default){
		$templateObj = new Select();
		$template = $templateObj->template();
		$this->_data->name = null;
		
		$dataOptions = null;
		if(isset($data->options)){
			$dataOptions = $data->options;
		}
		$options = $this->renderOption($dataOptions);
		
		$dataDefault = null;
		if(isset($default->content)){
			$dataDefault = $default->content;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		$result = $this->renderInput($result);
		$result = str_replace('[options]', $options, $result);
		return $result;
	}
	public function renderOption($data){
		$temp = '';
		foreach($data as $each){
			$value = (object) array();
			$value->value = null;
			$value->text = null;
			$value->selected = false;
			$value->id = null;
			$value->class = null;
			foreach($each as $key=>$eachEach){
				foreach($value as $keyValue=>$eachValue){
					if($keyValue==$key && $eachEach!=null){
						$value->$keyValue = $eachEach;
					}
				}
			}
			$templateOptionObj = new Option();
			$templateOption = $templateOptionObj->template();
			if($value->value!=null){
				$valueProp = 'value="'.$value->value.'"';
				$templateOption = str_replace('[value]',$valueProp,$templateOption);
			}else{
				$valueProp = '';
				$templateOption = str_replace(' [value]',$valueProp,$templateOption);
			}
			if($value->text!=null){
				$valueProp = $value->text;
				$templateOption = str_replace('[text]',$valueProp,$templateOption);
			}else{
				$valueProp = '';
				$templateOption = str_replace(' [text]',$valueProp,$templateOption);
			}
			if($value->selected!=false){
				$valueProp = 'selected';
				$templateOption = str_replace('[selected]',$valueProp,$templateOption);
			}else{
				$valueProp = '';
				$templateOption = str_replace(' [selected]',$valueProp,$templateOption);
			}
			if($value->id!=null){
				$valueProp = 'id="'.$value->id.'"';
				$templateOption = str_replace('[id]',$valueProp,$templateOption);
			}else{
				$valueProp = '';
				$templateOption = str_replace(' [id]',$valueProp,$templateOption);
			}
			if($value->class!=null){
				$valueProp = 'class="'.$value->class.'"';
				$templateOption = str_replace('[class]',$valueProp,$templateOption);
			}else{
				$valueProp = '';
				$templateOption = str_replace(' [class]',$valueProp,$templateOption);
			}
			$temp = $temp . $templateOption;
		}
	return $temp;
	}
}