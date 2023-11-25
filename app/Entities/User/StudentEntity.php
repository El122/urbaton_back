<?php

namespace App\Entities\User;

class StudentEntity {
    public string $name;
    public string $surname;
    public string $patronymic;
    public string $email;
    public ?string $password;
    public int $group;

    public function __construct($name, $surname, $patronymic, $email, $password, $group) {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->password = $password;
        $this->group = $group;
    }

    public function getModel(): array {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'email' => $this->email,
        ];
    }
}
