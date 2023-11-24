<?php 

namespace App\Entities\User;

class Student {
    public function __constructor(
        public string $name,
        public string $surname,
        public string $patronymic,
        public string $email,
        public ?string $password,
        public int $group,
    ) {

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
