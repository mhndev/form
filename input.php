<?php

namespace mhndev;

abstract class input 
{

	protected $name;

	protected $type;

	protected $value;

	protected $errors = [];


    protected $attributes = [];


    /**
     * input constructor.
     * @param $name
     * @param string $type
     * @param null $value
     */
    public function __construct($name, $type = 'text', $value = null)
	{
		$this->name = $name;
		$this->type = $type;
		$this->value = $value;
	}


    /**
     * @param $attribute
     * @param $value
     * @return $this
     */
    public function setAttribute($attribute, $value)
	{
        if(is_array($value) && \mhndev\isAssoc($value)){
            $key = key($value);

            if(empty($this->attributes[$attribute])) {
                $this->attributes[$attribute] = [];
            }
            $this->attributes[$attribute][$key] = $value[$key];

        }else {
            $this->attributes[$attribute] = $value;
        }
		return $this;
	}


    /**
     * @param $where
     * @param null $attribute
     * @return mixed
     */
    public function getAttribute($where, $attribute = null)
	{
        if(empty($attribute))
            return $this->attributes[$where];

		return $this->attributes[$where][$attribute];
	}
    

	public function getAttributes()
	{
		return $this->attributes;
	}


	abstract public function checkError();


	public function getName()
	{
		return $this->name;
	}

    public function getType()
    {
		return $this->type;
	}

	public function getValue()
	{
		return $this->value;
	}

    /**
     * @param $value
     */
    public function setValue($value)
	{
		$this->value=$value;

	}

	public function getErrors()
	{
		return $this->errors;
	}


    abstract public function render();

}
