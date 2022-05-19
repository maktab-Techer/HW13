<?php
namespace App\Core;
abstract class Validation
{
    public $errors;
    const email = "email";
    const required = "required";
    const min = "min";

    
abstract function getRules(): array;

    public function validate()
    {
        foreach ($this->getRules() as $attribute => $rules) {
            foreach ($rules as $rule) {
                $ruleName = $rule;
                $attributeValue = $this->$attribute;
                if ($ruleName == self::required && !$attributeValue) {
                    $this->addErrorByRule($attribute, self::required);
                }
                if ($ruleName == self::email && !filter_var($attributeValue, FILTER_VALIDATE_EMAIL))
                    $this->addErrorByRule($attribute, self::email);
            }
        }
        return $this->errors;
    }
    public function setAttribute($attribute, $value = null)
    {
        $this->attribute = $value;
    }


    public function errorMessages()
    {
        return [
            self::required => 'This field is required',
            self::email => 'This field must be valid email address',
            self::min => 'Min length of this field must be {min}',
        ];
    }
    public function errorMessage($rule)
    {
        return $this->errorMessages()[$rule];
    }
    protected function addErrorByRule(string $attribute, string $rule, $params = [])
    {
        $params['field'] ??= $attribute;
        $errorMessage = $this->errorMessage($rule);
        foreach ($params as $key => $value) {
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }
        $this->errors[$attribute][] = $errorMessage;
    }


}