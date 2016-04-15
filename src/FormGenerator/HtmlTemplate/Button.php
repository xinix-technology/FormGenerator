<?php

namespace FormGenerator\HtmlTemplate;

class Button{
	public function template(){
		return  '<button [name] [id] [class] [attributes]>[text]</button>';
	}
}

