<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\TextArea;
use \stdClass;

class TextAreaClass extends Component{
		
	public function render($data,$default){			
		$templateObj = new TextArea();
		$template = $templateObj->template();
		$this->_data->name = null;
		$this->_data->value = null;
		$this->_data->placeholder = null;
		$dataDefault = null;
		if(isset($default->content)){
			$dataDefault = $default->content;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		if(isset($data->value)){
			$result = str_replace('[value]',$data->value,$result);
		}
		$result = $this->renderInput($result);
		return $result;
	}
}