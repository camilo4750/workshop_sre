<?php

namespace App\Dto\User;

use App\Dto\CoreDto;

class UserDto extends CoreDto
{
    public int $id;

    public string $fullName;

    public string $email;

    public string $phone;

    public string $active;

    public ?string $createAt;
}
