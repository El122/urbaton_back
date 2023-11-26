<?php

namespace App\Entities\User;

class ParentEntity
{
    public string $name;
    public string $surname;
    public string $patronymic;
    public string $email;
    public string $phone;
    public ?string $password;
    public ?int $children;

    public function __construct($name, $surname, $patronymic, $email, $phone, $password, $children = null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->children = $children;
    }

    public function getModel()
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
