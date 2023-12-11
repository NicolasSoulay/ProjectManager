<?php

namespace Nicolas\ProjectManager\Form;

use Nicolas\ProjectManager\Kernel\FormBuilder;

class ProjectForm
{
    public static function createForm(string $method, $action = ""): string
    {
        return self::$method($action);
    }

    private static function create(string $action): string
    {
        $form_builder = new FormBuilder(method: "POST", action: $action);
        $form_builder->addTextInput(identifier: "name", label: "Nom de projet", required: true)
            ->addSubmit(label: "Envoyer", value: "createProject");

        return $form_builder->createForm();
    }
}
