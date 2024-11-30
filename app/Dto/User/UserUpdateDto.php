<?php

namespace App\Dto\user;

use App\Dto\CoreDto;

class UserUpdateDto extends CoreDto
{
    public int $id;
    public string $name_1;

    public ?string $name_2;

    public string $surname_1;

    public ?string $surname_2;

    public string $email;

    public int $phone;

    public bool $active;
}
