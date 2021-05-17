<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating", indexes={@ORM\Index(name="R_4", columns={"idK"})})
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rate", type="string", length=18, nullable=true, options={"fixed"=true})
     */
    private $rate;

    /**
     * @var \App\Models\Korisnici
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Models\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idK", referencedColumnName="idK")
     * })
     */
    private $idk;


}
