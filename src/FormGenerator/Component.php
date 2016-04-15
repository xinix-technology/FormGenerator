<?php

namespace FormGenerator;
use \stdClass;

class Component{
	private $data;
	public function __construct(){
		$this->_data = new stdClass();
	//	$this->_data = (object) array();
		$this->_data->type = null;
		$this->_data->id = null;
		$this->_data->class = null;
		$this->_data->attributes = (object) array();
		$this->_data->text = null;
	}
	public function dataCompare($data){
		if(count($data)>0){
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
	public function setDefault($data){
		$this->dataCompare($data);
	}
	public function setData($data){
		$this->dataCompare($data);
	}
	public function renderBasic($data=null,$default=null,$template=null){
		if($default!=null){
			$this->setDefault($default);
		}
		if($data!=null){
			$this->setData($data);
		}
		foreach($this->_data as $key=>$each){
			switch($key){
				case 'type':
					if($each!=null){
						$template = str_replace('[type]',$each,$template);
					}else{
						$template = str_replace('[type]','',$template);
					}
					break;
				case 'text':
					if($each!=null){
						$template = str_replace('[text]',$each,$template);
					}else{
						$template = str_replace('[text]','',$template);
					}
					break;
				case 'class':
					if($each!=null){
						$temp = 'class="'.$each.'"';
						$template = str_replace('[class]',$temp,$template);
					}else{
						$template = str_replace(' [class]','',$template);
					}
					break;
				case 'id':
					if($each!=null){
						$temp = 'id="'.$each.'"';
						$template = str_replace('[id]',$temp,$template);
					}else{
						$template = str_replace(' [id]','',$template);
					}
					break;
				case 'attributes':
					if($each!=null){
						$temp = '';
						foreach($each as $eachKey=>$eachVal){
							$temp = $temp.$eachKey.'="'.$eachVal.'" ';
						}
						$temp = substr($temp,0,-1);
						$template = str_replace('[attributes]',$temp,$template);
					}else{
						$template = str_replace(" [attributes]",'',$template);
					}
					break;
			}
		}
		
		return $template;
	}
	public function renderInput($template=null){
		foreach($this->_data as $key=>$each){
			switch($key){
				case 'name':
					if($each!=null){
						$temp = 'name="'.$each.'"';
						$template = str_replace('[name]',$temp,$template);
					}else{
						$template = str_replace(' [name]','',$template);
					}
					break;
				case 'value':
					if($each!=null){
						$temp = 'value="'.$each.'"';
						$template = str_replace('[value]',$temp,$template);
					}else{
						$template = str_replace('[value]','',$template);
					}
					break;
				case 'placeholder':
					if($each!=null){
						$temp = 'placeholder="'.$each.'"';
						$template = str_replace('[placeholder]',$temp,$template);
					}else{
						$template = str_replace(" [placeholder]",'',$template);
					}
					break;
			}
		}
		
		return $template;
	}
}