<?php

namespace mhndev\form;

class textarea extends input
{
    public function checkError()
    {

        if(!empty($this->errors)){
            return $this->errors;
        }

        if(!preg_match("/^[A-Za-z0-9 ,.'-]{0,200}+$/",$this->value)) {
            $this->errors[]='The message you entered does not appear to be valid.';
        }
    }

    public function render()
    {
        $textarea = '';
        foreach($this->getAttribute('textarea') as $attr=>$val){
            $textarea .= " $attr=$val ";
        }

        $errors = $this->getErrors();

        if(!empty($errors))
            $errorsText = implode(' ', $errors);
        else
            $errorsText = '';



        return "<div class='row'>
                <div class='".$this->getAttribute('label','label_class')."'>
                  <label class='title'>".$this->getAttribute('label','label_text')." :</label>
                </div>
                <div class='textarea'>
                  <textarea $textarea>$errorsText</textarea>  
                </div>
                <div class='clear'></div>
              </div>";
    }
}
