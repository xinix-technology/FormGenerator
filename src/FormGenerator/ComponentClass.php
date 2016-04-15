<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Input;
use FormGenerator\HtmlTemplate\Range;
use FormGenerator\HtmlTemplate\Submit;
use FormGenerator\HtmlTemplate\Select;
use FormGenerator\HtmlTemplate\TextArea;
use FormGenerator\HtmlTemplate\Checkbox;
use FormGenerator\HtmlTemplate\Image;



use \stdClass;

class ComponentClass extends Component{
	
	public function render($data,$default){
		$labelWrapper = '';
		if(isset($data->label_wrapper)){
			$labelWrapper = $data->label_wrapper;
		}
		$dataLabel = '';
		if(isset($data->label)){
			$dataLabel = $data->label;
		}
		$labelObj = new LabelClass();
		$label = $labelObj->render($labelWrapper,$dataLabel,$default);
		
		$rowWrapper = '';
		if(isset($data->row_wrapper)){
			$rowWrapper = $data->row_wrapper;
		}
		$rowObj = new RowClass();
		$row = $rowObj->render($rowWrapper,$default);
		$input = '';
		$result = '';
		switch($data->type){
			case 'select':
				$selectObj = new SelectClass();
				$input = $selectObj->render($data,$default);
				break;
			case 'checkbox':
				$checboxObj = new CheckboxClass();
				$input = $checboxObj->render($data,$default);
				break;
			case 'radio':
				$radioObj = new RadioClass();
				$input = $radioObj->render($data,$default);
				break;
			case 'range':
				$rangeObj = new RangeClass();
				$input = $rangeObj->render($data,$default);
				break;
			case 'textarea':
				$areaObj = new TextAreaClass();
				$input = $areaObj->render($data,$default);
				break;
			case 'button':
				$buttonObj = new ButtonClass();
				$input = $buttonObj->render($data,$default);
				break;
			case 'submit':
				$submitObj = new SubmitClass();
				$input = $submitObj->render($data,$default);
				break;
			case 'image':
				$imageObj = new ImageClass();
				$input = $imageObj->render($data,$default);
				break;
			default:
				$inputObj = new InputClass();
				$input = $inputObj->render($data,$default);
				break;
			
		}
		$type = $data->type;
		if($type=='type="submit"'){
			$result = $input;
		}else{
			$result = $label.$input;
			$result = str_replace('[content]',$result,$row);
		}
		return $result;
	}

}
