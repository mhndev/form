<?php 

class submit extends input
{
	public function checkError()
	{
		return null;
	}

	public function render()
	{
		return "<div class='row'><button class='".$this->getAttribute('button','class')."'>".$this->getAttribute('button','text')."</button><div class='clear'></div></div>";
	}
}
