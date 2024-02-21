<?php

namespace App\Dto\user;

use App\Dto\CoreDto;

class   userNewDto extends CoreDto
{
    public string $name_1;

    public ?string $name_2;

    public string $surname_1;

    public ?string $surname_2;

    public string $email;

    public string $password;

    public int $phone;

    public bool $active;

    public int $type_user_id;
}
