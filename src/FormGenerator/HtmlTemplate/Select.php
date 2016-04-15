<?php

namespace FormGenerator\HtmlTemplate;

class Select{
	public function template(){
		return  '<select [name] [id] [class] [attributes]>[options]</select>';
	}
}
