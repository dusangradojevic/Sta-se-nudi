<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chats
 *
 * @ORM\Table(name="chats", indexes={@ORM\Index(name="R_2", columns={"user_to"}), @ORM\Index(name="R_3", columns={"user_from"})})
 * @ORM\Entity
 */
class Chats
{
    /**
     * @var int
     *
     * @ORM\Column(name="idc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message", type="string", length=256, nullable=true)
     */
    private $message;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=true)
     */
    private $datetime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \App\Models\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_to", referencedColumnName="idK")
     * })
     */
    private $userTo;

    /**
     * @var \App\Models\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_from", referencedColumnName="idK")
     * })
     */
    private $userFrom;


}
