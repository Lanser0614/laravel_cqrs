<?php

namespace App\Modules\User\DTO;

use App\DTO\BaseDTO;

class UserStoreDTO extends BaseDTO
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            name: self::parseString($data['name']),
            email: self::parseString($data['email']),
            password: self::parseString($data['password'])
        );
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    public  function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ];
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
