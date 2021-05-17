<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oglasi
 *
 * @ORM\Table(name="oglasi", indexes={@ORM\Index(name="R_1", columns={"idK"})})
 * @ORM\Entity
 */
class Oglasi
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ido;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=256, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=true)
     */
    private $text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isValid", type="boolean", nullable=true)
     */
    private $isvalid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="category", type="string", length=30, nullable=true)
     */
    private $category;

    /**
     * @var \App\Models\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idK", referencedColumnName="idK")
     * })
     */
    private $idk;


}
