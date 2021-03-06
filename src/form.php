<?php

namespace mhndev\form;

class form
{
	
	protected $inputs;
	protected $action;
	protected $method;
	protected $data;
	protected $errors;


	/**
	 * form constructor.
	 * @param array $inputs
	 * @param string $action
	 * @param string $method
     */
	public function __construct($inputs = [], $action = '', $method = 'post')
	{
		$this->method = $method;
		$this->action = $action;
		$this->inputs = $inputs;
	}

	/**
	 * @param input $input
     */
	public function addInput(input $input)
	{
		$this->inputs[] = $input;
	}

	public function getErrors()
	{
		$this->errors = [];
		if(!empty($this->inputs)){
			foreach($this->inputs as $input){
				$this->errors[$input->getName()] = $input->checkError();
			}
		}

		return $this->errors;
	}


	public function getData()
	{

		if(!empty($this->data)){
			return $this->data;
		}
		$this->data = [];

		foreach($this->inputs as $input){
			$this->data[$input->getName()] = $input->getValue();
		}

		return $this->data;
	}

	public function render()
	{
		$action = '';
		$action = !empty($this->$action) ? 'action='.$this->action.'' : '';


		$formAsString = "<form $action method=\"$this->method\" >";

		foreach($this->inputs as $input){
			$formAsString .= $input->render();
		}

        $formAsString .= '</form>';

		return $formAsString;
	}


	/**
	 *[ 'email'=>'milad.a@mabna.com',
	 *   'name'=>'milad',
	 *  'message'=>'test'
	 *
	 *]
	 *
	 * @param array $data
	 * @return array
	 */
    public function fill(array $data)
    {
        /** @var input $input */
        foreach($this->inputs as $input){
            $key = $input->getName();

            if(!empty($data[$key])){
            	$input->setValue($data[$key]);
                $this->data[$key] = $data[$key];
            }
        }

        return $this->getErrors();
    }


}
