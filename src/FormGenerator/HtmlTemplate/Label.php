<?php

namespace FormGenerator\HtmlTemplate;

class Label{
	public function template(){
		return  '<[label_wrapper] [class] [id] [attributes]>[label]</[label_wrapper]>';
	}
}

