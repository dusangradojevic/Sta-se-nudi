<?php

namespace App\Models\Entities;

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
     * @var \App\Models\Entities\Korisnici
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Models\Entities\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idK", referencedColumnName="idK")
     * })
     */
    private $idk;



    /**
     * Set idr.
     *
     * @param int $idr
     *
     * @return Rating
     */
    public function setIdr($idr)
    {
        $this->idr = $idr;

        return $this;
    }

    /**
     * Get idr.
     *
     * @return int
     */
    public function getIdr()
    {
        return $this->idr;
    }

    /**
     * Set rate.
     *
     * @param string|null $rate
     *
     * @return Rating
     */
    public function setRate($rate = null)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate.
     *
     * @return string|null
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set idk.
     *
     * @param \App\Models\Entities\Korisnici $idk
     *
     * @return Rating
     */
    public function setIdk(\App\Models\Entities\Korisnici $idk)
    {
        $this->idk = $idk;

        return $this;
    }

    /**
     * Get idk.
     *
     * @return \App\Models\Entities\Korisnici
     */
    public function getIdk()
    {
        return $this->idk;
    }
}
