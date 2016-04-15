<?php

namespace FormGenerator\HtmlTemplate;

class Option{
	public function template(){
		return  '<option [value] [id] [class] [selected]>[text]</option>';
	}
}