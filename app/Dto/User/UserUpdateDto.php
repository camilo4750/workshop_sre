<?php

namespace App\Dto\User;

use App\Dto\CoreDto;

class UserUpdateDto extends CoreDto
{
    public int $id;

    public string $full_name;

    public string $email;

    public int $phone;

    public bool $active;
}
