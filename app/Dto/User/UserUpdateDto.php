<?php

namespace App\Dto\User;

use App\Dto\CoreDto;

class UserUpdateDto extends CoreDto
{
    public int $id;

    public string $full_name;

    public string $email;

    public string $phone;

    public bool $active;
}
