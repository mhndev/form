<?php

namespace mhndev\form;

class email extends input
{
	public function checkError()
	{
		if(!empty($this->errors)){
			return $this->errors;
		}
		
		if(!preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',$this->value)) {
			return $this->errors[]= 'The Email Address is not valid.';
		}
	}

	public function render()
	{
		$inputHtml = "<div class='row'><div class='lable'><label class='".$this->getAttribute('label','label_class')."'>".$this->getAttribute('label','label_text')." :</label></div>";

		$input = '';
		foreach($this->getAttribute('input') as $attr=>$val)
			$input .= " $attr=$val ";


		$errors = $this->getErrors();

		if(!empty($errors))
			$errorsText = implode(' ', $errors);
		else
			$errorsText = '';


		return  $inputHtml."<div class='input'>
				   <input $input required='' value='$errorsText'/>
				</div><div class='clear'></div>
		  </div>";
	}
}
