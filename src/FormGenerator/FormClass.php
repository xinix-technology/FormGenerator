<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Form;
use \stdClass;

class FormClass{
	private $_data;
	public function __construct(){
		$this->_data = new stdClass();
		$this->_data->id = null;
		$this->_data->class = null;
		$this->_data->action = null;
		$this->_data->label = null;
		$this->_data->attributes = (object) array('enctype'=>'multipart/form-data');
		$this->_data->form_wrapper = new stdClass();
		$this->_data->form_wrapper->type = null;
		$this->_data->form_wrapper->class = null;
		$this->_data->form_wrapper->id = null;
		$this->_data->form_wrapper->attribute = null;
	//	$this->_data->form_wrapper->text = null;
	}
	public function renderForm($data=null){
		$this->dataCompare($data->default);
		$this->dataCompare($data->formBuilder);
		$template = new Form();
		$form['start'] = $template->templateStart();
		$form['end'] = $template->templateEnd(); 
		foreach($this->_data as $key=>$eachData){
			switch ($key) {
				case 'id':
					if($eachData!=null){
						$temp = 'id="'.$eachData.'"';
					}else{
						$temp = '';
					}
					$form = str_replace('[id]', $temp, $form);
				break;
				case 'class':
					if($eachData!=null){
						$temp = 'class="'.$eachData.'"';
					}else{
						$temp = '';
					}
					$form = str_replace('[class]', $temp, $form);
				break;
				case 'action':
					if($eachData!=null){
						$temp = 'action="'.$eachData.'"';
					}else{
						$temp = 'action=""';
					}
					$form = str_replace('[action]', $temp, $form);
				break;
				case 'label':
					if($eachData!=null){
						$temp = $eachData;
					}else{
						$temp = '';
					}
					$form = str_replace('[label]', $temp, $form);
				break;
				case 'attributes':
					if(count($eachData)>0){
						$temp = '';
							foreach($eachData as $keyAttribute=>$eachAttribute){
								$temp = $temp.$keyAttribute.'="'.$eachAttribute.'" ';
							}
							$temp = substr($temp, 0,-1);
					}else{
						$temp = '';
					}
					$form = str_replace('[attributes]', $temp, $form);
				break;
				case 'form_wrapper':
					$templateWrapperOpen = '';
					$templateWrapperClose = '';
					if(count($eachData)>0){
						$templateWrapperOpen = '<[type] [class] [id] [attributes]>';
						$templateWrapperClose = '</[type]>';
						if($eachData->type!=null){
							$templateWrapperOpen = str_replace('[type]', $eachData->type, $templateWrapperOpen);
							$templateWrapperClose = str_replace('[type]', $eachData->type, $templateWrapperClose);
						}else{
							$templateWrapperOpen = str_replace('[type]','',$templateWrapperOpen); 
							$templateWrapperClose = str_replace('[type]','',$templateWrapperClose); 
						}
						if($eachData->class!=null){
							$templateWrapperOpen = str_replace('[class]', 'class="'.$eachData->class.'"', $templateWrapperOpen);
						}else{
							$templateWrapperOpen = str_replace(' [class]','',$templateWrapperOpen); 
						}
						if($eachData->id!=null){
							$templateWrapperOpen = str_replace('[id]', 'id="'.$eachData->id.'"', $templateWrapperOpen);
						}else{
							$templateWrapperOpen = str_replace(' [id]','',$templateWrapperOpen); 
						}
						/*
						if($eachData->text!=null){
							$templateWrapperOpen = str_replace('[text]', $eachData->text.'"', $templateWrapperOpen);
						}else{
							$templateWrapperOpen = str_replace('[text]','',$templateWrapperOpen); 
						}*/
						if(isset($eachData->attributes)){
							$temp = '';
							foreach($eachData->attributes as $keyWrapperAttribute=>$eachWrapperAttribute){
								$temp = $temp.$keyWrapperAttribute.'="'.$eachWrapperAttribute.'" ';
							}
							$temp = substr($temp, 0,-1);
							$templateWrapperOpen = str_replace('[attributes]', $temp, $templateWrapperOpen);
						}else{
							$templateWrapperOpen = str_replace(' [attributes]','',$templateWrapperOpen); 
						}
					}
					$form = str_replace('[form_wrapper_open]', $templateWrapperOpen, $form);
					$form = str_replace('[form_wrapper_close]', $templateWrapperClose, $form);
			}
		}
		
		return $form;
	}
	public function dataCompare($data){
		foreach($data as $keyUser=>$dataUser){
			foreach($this->_data as $key=>$eachData){
				if($keyUser==$key && $dataUser!=null){
					if(is_object($dataUser)){
						foreach($dataUser as $keyDataUser=>$eachDataUser){
							if($eachDataUser!=null){
								$this->_data->$key->$keyDataUser = $eachDataUser;
							}
						}
					}else{
						$this->_data->$key = $dataUser;
					}
				}
			}
		}
	}
}
