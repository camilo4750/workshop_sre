<?php

namespace App\Dto\User;

use App\Dto\CoreDto;

class UserNewDto extends CoreDto
{
    public string $full_name;

    public string $email;

    public string $password;

    public string $phone;

    public bool $active;
}
