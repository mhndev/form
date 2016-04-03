<?php

class text extends input
{
	public function checkError()
	{

		if(!preg_match("/^[A-Za-z .'-]{1,20}+$/",$this->value)) {
			$this->errors[]='The Name you entered does not appear to be valid.<br />';
		}
	}

	public function render()
	{
		$inputHtml = "<div class='row'><div class='label'><label class='".$this->getAttribute('label','label_class')."'>".$this->getAttribute('label','label_text')." :</label></div>";
		
		$input = '';
		foreach($this->getAttribute('input') as $attr=>$val){
			$input .= " $attr=$val ";
		}

		return  $inputHtml."<div class='input'>
				   <input $input>
				</div><div class='clear'></div>
		  </div>";
	}
}
