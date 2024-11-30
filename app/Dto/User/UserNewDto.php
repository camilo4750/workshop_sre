<?php

namespace App\Dto\user;

use App\Dto\CoreDto;

class UserNewDto extends CoreDto
{
    public string $full_name;

    public string $email;

    public string $password;

    public int $phone;

    public bool $active;
}
