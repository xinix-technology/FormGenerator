<?php

namespace FormGenerator\HtmlTemplate;

class Form{
	public function templateStart(){
		return  '<form [id] [action] [class] [attributes]><div class="listViewContainer">[form_wrapper_open]<label for="">[label]</label><ul class="listText">';
	}
	public function templateEnd(){
		return '</ul>[form_wrapper_close]</div><div class="buttonArea">[submit]</div></form>';
	}
}

