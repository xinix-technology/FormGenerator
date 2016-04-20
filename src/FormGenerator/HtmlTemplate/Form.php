<?php

namespace FormGenerator\HtmlTemplate;

class Form{
	public function templateStart(){
		return  '<form [id] [action] [class] [attributes]><div class="listViewContainer">[form_wrapper_open]<label for="">[label]</label><ol class="listText">';
	}
	public function templateEnd(){
		return '</ol>[form_wrapper_close]</div><div class="buttonArea">[submit]</div></form>';
	}
}

