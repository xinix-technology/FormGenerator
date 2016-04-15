<?php
namespace FormGenerator;

use FormGenerator\FormClass;

class FormBuilder{
	
	private $_error_message;
	private $_rendered;
	private $_form;
	private $_component;
	private $_submit;
	private $_complete;
	
	public function __construct(){
		$this->_error_message = null;
		$this->_rendered = '';
		$this->_form = array();
		$this->_component = '';
		$this->_submit = '';
		$this->_complete = '';
	}
		
	public function build($json){
		$data = $this->decodeJson($json);
		$this->renderForm($data);
		$this->renderAllComponent($data->formComponents,$data->default);
		$this->_complete = $this->render();
		return $this->_complete;
	}
	
	public function decodeJson($json){
		$temp = json_decode($json);
		if(json_last_error()>0){
			switch (json_last_error()) {
		        case JSON_ERROR_DEPTH:
		            $this->_error_message = 'JSON ERROR - Maximum stack depth exceeded';
		        break;
		        case JSON_ERROR_STATE_MISMATCH:
		            $this->_error_message = 'JSON ERROR - Underflow or the modes mismatch';
		        break;
		        case JSON_ERROR_CTRL_CHAR:
		            $this->_error_message = 'JSON ERROR - Unexpected control character found';
		        break;
		        case JSON_ERROR_SYNTAX:
		            $this->_error_message = 'JSON ERROR - Syntax error, malformed JSON';
		        break;
		        case JSON_ERROR_UTF8:
		            $this->_error_message = 'JSON ERROR - Malformed UTF-8 characters, possibly incorrectly encoded';
		        break;
		        default:
		            $this->_error_message = 'JSON ERROR - Unknown error';
		        break;
		    }
			$this->throwError();
		}
		return $temp;
	}
	public function render(){
		$this->_form['end'] = str_replace('[submit]',$this->_submit,$this->_form['end']);
		$complete = $this->_form['start'].$this->_component.$this->_form['end'];
		return $complete;
	}
	
	public function renderForm($data=null){
		foreach($data as $key=>$eachdata){
			switch ($key) {
				case 'id':
					if($eachdata==null){
						$this->_error_message = 'FORM RENDER ERROR - Form ID not available';
					}
				break;
				case 'action':
					if($eachdata==null){
						$this->_error_message = 'FORM RENDER ERROR - Form ACTION not available';
					}
			}
		}
		$this->throwError();
		$formClass = new FormClass();
		$this->_form = $formClass->renderForm($data);
	}
	
	public function renderAllComponent($data=null,$default=null){
		foreach($data as $eachData){
			$flag = false;
			foreach($eachData->content as $eachContent){
				if($eachContent->type=='submit'){
					$flag=true;
				}
			}
			if($flag==true){
				$this->renderSubmit($eachData,$default);
			}else{
				$this->renderComponent($eachData,$default);
			}
		}
	}
	public function renderComponent($data,$default){
		foreach($data->content as $eachdata){
			foreach($eachdata as $key=>$eachVar){
				switch ($key) {
					case 'name':
						if($eachdata==null){
							$this->_error_message = 'COMPONENT RENDER ERROR - Component NAME not available';
						}
					break;
					case 'type':
						if($eachdata==null){
							$this->_error_message = 'COMPONENT RENDER ERROR - Component INPUT TYPE not available';
						}
						break;
				}
			}
		}
		$this->throwError();
		$result = '<li class="wrapper">';
		$liTag = '';
		$component = '';
		if(isset($data->li_tag)){
			$liTag = $this->renderLiTag($data->li_tag,$default);
		}
		foreach($data->content as $eachContent){
			$component = $component.$this->componentCaller($eachContent, $default);
		}
		$result = $result.$liTag.$component.'</li>';
		
		$this->_component = $this->_component.$result;
	}
	public function renderSubmit($data,$default){
		foreach($data->content as $eachdata){
			foreach($eachdata as $key=>$eachVar){
				switch ($key) {
					case 'name':
						if($eachdata==null){
							$this->_error_message = 'COMPONENT RENDER ERROR - Component NAME not available';
						}
					break;
					case 'type':
						if($eachdata==null){
							$this->_error_message = 'COMPONENT RENDER ERROR - Component INPUT TYPE not available';
						}
						break;
				}
			}
		}
		$this->throwError();
		
		foreach($data->content as $eachContent){
			$componentClass = new ComponentClass();
			$result = $componentClass->render($eachContent,$default);
		}
		
		$this->_submit = $result;
	}
	public function renderLiTag($data,$default){		
		$tag = new TagClass();
		$result = '';
		foreach($data as $eachData){
			$result = $result.$tag->render($eachData,$default);
		}
		return $result;
	}
	public function throwError(){
		if($this->_error_message!=null){
			echo $this->_error_message;
			die;
		}
	}
	public function componentCaller($data,$default){
		$componentClass = new ComponentClass();
		$component = $componentClass->render($data,$default);
		return $component;
	}
}
