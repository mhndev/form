<?php

namespace mhndev\form;

class text extends input
{
	public function checkError()
	{
		if(!empty($this->errors)){
			return $this->errors;
		}

		if(!preg_match("/^[A-Za-z .'-]{1,20}+$/",$this->value)) {
			$this->errors[]='The Name is not valid.';
		}
	}

	public function render()
	{
		$inputHtml = "<div class='row'><div class='label'><label class='".$this->getAttribute('label','label_class')."'>".$this->getAttribute('label','label_text')." :</label></div>";

		$input = '';
		foreach($this->getAttribute('input') as $attr=>$val){
			$input .= " $attr=$val ";
		}

		$errors = $this->getErrors();

		if(!empty($errors))
			$errorsText = implode(' ', $errors);
		else
			$errorsText = '';


		return  $inputHtml."<div class='input'>
				   <input $input required='' value='$errorsText'>
				</div><div class='clear'></div>
		  </div>";
	}
}
