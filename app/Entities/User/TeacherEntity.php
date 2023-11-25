<?php

namespace App\Entities\User;

class TeacherEntity {
    public string $user_id;
    public ?int $experience;
    public string $role;

    public function __construct($name, $surname, $patronymic, $email, $password, $experience, $role) {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->password = $password;
        $this->experience = $experience;
        $this->role = $role;
    }

    public function getModel() {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'email' => $this->email,
        ];
    }
}
