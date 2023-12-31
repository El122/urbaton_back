<?php

namespace App\Entities\User;

class StudentEntity {
    public string $name;
    public string $surname;
    public string $patronymic;
    public string $email;
    public string $phone;
    public ?string $password;
    public int $group;

    public function __construct($name, $surname, $patronymic, $email, $phone, $password, $group) {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->group = $group;
    }

    public function getModel(): array {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
