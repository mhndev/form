<?php

class email extends input
{
	public function checkError()
	{
		if(!preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',$this->value)) {
			return $this->errors[]= 'The Email Address you entered does not appear to be valid.<br />';
		}
	}

	public function render()
	{
		$inputHtml = "<div class='row'><div class='lable'><label class='".$this->getAttribute('label','label_class')."'>".$this->getAttribute('label','label_text')." :</label></div>";

		$input = '';
		foreach($this->getAttribute('input') as $attr=>$val)
			$input .= " $attr=$val ";


		return  $inputHtml."<div class='input'>
				   <input $input>
				</div><div class='clear'></div>
		  </div>";
	}
}
