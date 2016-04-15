<?php

namespace FormGenerator\HtmlTemplate;

class TextArea{
	public function template(){
		return  '<textarea [name] [id] [class] [placeholder] [attributes]>[value]</textarea>';
	}
}
