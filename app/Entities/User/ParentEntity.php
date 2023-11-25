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

    public function __construct($name, $surname, $patronymic, $email, $phone, $password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
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
