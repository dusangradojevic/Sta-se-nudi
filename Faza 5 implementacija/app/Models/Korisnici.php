<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Korisnici
 *
 * @ORM\Table(name="korisnici")
 * @ORM\Entity
 */
class Korisnici
{
    /**
     * @var int
     *
     * @ORM\Column(name="idK", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idk;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isValid", type="boolean", nullable=true)
     */
    private $isvalid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=25, nullable=true)
     */
    private $surname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=35, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=20, nullable=true)
     */
    private $username;


}
