<?php

namespace FormGenerator\HtmlTemplate;

class Image{
	public function template(){
		return  '<div class="span-4"><div class="imageArea"><div class="bg image-thumb"><button [class] [attributes]>+</button><input type="hidden" [id] [name] [value]></div></div></div>';
	}
}

