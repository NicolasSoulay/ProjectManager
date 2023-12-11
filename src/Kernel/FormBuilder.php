<?php

namespace Nicolas\ProjectManager\Kernel;

class FormBuilder
{
    private string $action;
    private string $method;
    private string $inputs;

    public function __construct(string $action, string $method)
    {
        $this->action = $action;
        $this->method = $method;
        $this->inputs = '';
    }

    public function createForm(): string
    {
        $form = "<form class='container col-4' action='$this->action' method='$this->method'>";
        $form .= $this->inputs;
        $form .= "</form>";
        return $form;
    }

    public function addTextInput(string $identifier, string $label = '', string $value = '', string $placeholder = '', string $pattern = '', bool $required = false): FormBuilder
    {
        $input = "<div class='mb-3'>";
        if ($label !== '') {
            $input .= "<label class='form-label' for='$identifier'>$label</label>";
        }

        $input .= "<input class='form-control' type='text' id='$identifier' name='$identifier'";

        if ($value !== '') {
            $input .= " value='$value'";
        }
        if ($placeholder !== '') {
            $input .= " placeholder='$placeholder'";
        }
        if ($pattern !== '') {
            $input .= " pattern='$pattern'";
        }
        if ($required) {
            $input .= " required";
        }
        $input .= "></div>";
        $this->inputs .= $input;
        return $this;
    }

    public function addEmailInput(string $identifier, string $label = '', string $value = '', string $placeholder = '', string $pattern = '', bool $required = false): FormBuilder
    {
        $input = "<div class='mb-3'>";
        if ($label !== '') {
            $input .= "<label class='form-label' for='$identifier'>$label</label>";
        }

        $input .= "<input class='form-control' type='email' id='$identifier' name='$identifier'";

        if ($value !== '') {
            $input .= " value='$value'";
        }
        if ($placeholder !== '') {
            $input .= " placeholder='$placeholder'";
        }
        if ($pattern !== '') {
            $input .= " pattern='$pattern'";
        }
        if ($required) {
            $input .= " required";
        }
        $input .= "></div>";
        $this->inputs .= $input;
        return $this;
    }

    public function addPasswordInput(string $identifier, string $label = '', bool $required = false): FormBuilder
    {
        $input = "<div class='mb-3'>";
        if ($label !== '') {
            $input .= "<label class='form-label' for='$identifier'>$label</label>";
        }
        $input .= "<input class='form-control' type='password' id='$identifier' name='$identifier'";
        if ($required) {
            $input .= " required";
        }
        $input .= "></div>";
        $this->inputs .= $input;
        return $this;
    }

    public function addNumberInput(string $identifier, string $label = '', string $min = '', string $max = '', string $value = '', string $placeholder = '', bool $required = false): FormBuilder
    {
        $input = "<div class='mb-3'>";
        if ($label !== '') {
            $input .= "<label class='form-label' for='$identifier'>$label</label>";
        }

        $input .= "<input class='form-control' type='number' id='$identifier' name='$identifier'";

        if ($max !== '') {
            $input .= " max='$max'";
        }
        if ($min !== '') {
            $input .= " min='$min'";
        }
        if ($value !== '') {
            $input .= " value='$value'";
        }
        if ($placeholder !== '') {
            $input .= " placeholder='$placeholder'";
        }
        if ($required) {
            $input .= " required";
        }
        $input .= "></div>";
        $this->inputs .= $input;
        return $this;
    }

    public function addDateInput(string $identifier, string $label = '', string $min = '', string $max = '', string $value = '', string $placeholder = '', string $pattern = '', bool $required = false): FormBuilder
    {
        $input = "<div class='mb-3'>";
        if ($label !== '') {
            $input .= "<label class='form-label' for='$identifier'>$label</label>";
        }

        $input .= "<input class='form-control' type='date' id='$identifier' name='$identifier'";

        if ($max !== '') {
            $input .= " max='$max'";
        }
        if ($min !== '') {
            $input .= " min='$min'";
        }
        if ($value !== '') {
            $input .= " value='$value'";
        }
        if ($placeholder !== '') {
            $input .= " placeholder='$placeholder'";
        }
        if ($pattern !== '') {
            $input .= " pattern='$pattern'";
        }
        if ($required) {
            $input .= " required";
        }
        $input .= "></div>";
        $this->inputs .= $input;
        return $this;
    }

    /**
     * @param array<string,string> $options
     */
    public function addSelect(string $identifier, string $label, array $options, bool $required = false): FormBuilder
    {
        $input = "<div class='mb-3'>";
        if ($label !== '') {
            $input .= "<label class='form-label' for='$identifier'>$label</label>";
        }

        $input .= "<select class='form-select' name='$identifier' id='$identifier'";
        if ($required) {
            $input .= " required";
        }
        $input .= "></div>";
        foreach ($options as $key => $value) {
            $input .= "<option value ='$value'>$key</option>";
        }
        $input .= "</select></div>";
        $this->inputs .= $input;
        return $this;
    }

    public function addSubmit(string $label, string $value = 'submit'): FormBuilder
    {
        $this->inputs .= "<button class='btn btn-primary' type='submit' name='submit' value='$value'>$label</button>";
        return $this;
    }
}
