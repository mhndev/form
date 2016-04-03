<?php

namespace mhndev\form;

class textarea extends input
{
    public function checkError()
    {
        if(!preg_match("/^[A-Za-z .'-]{1,20}+$/",$this->value)) {
            $this->errors[]='The Name you entered does not appear to be valid.<br />';
        }
    }

    public function render()
    {
        $textarea = '';
        foreach($this->getAttribute('textarea') as $attr=>$val){
            $textarea .= " $attr=$val ";
        }

        return "<div class='row'>
                <div class='".$this->getAttribute('label','label_class')."'>
                  <label class='title'>".$this->getAttribute('label','label_text')." :</label>
                </div>
                <div class='textarea'>
                  <textarea $textarea></textarea>
                </div>
                <div class='clear'></div>
              </div>";
    }
}
