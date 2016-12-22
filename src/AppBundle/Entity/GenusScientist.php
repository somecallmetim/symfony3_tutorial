<?php
/**
 * Created by PhpStorm.
 * User: timbauer
 * Date: 12/21/16
 * Time: 8:06 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Genus;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="genus_scientist")
 * @UniqueEntity(
 *     fields={"genus", "user"},
 *     message="This user is already studying this genus",
 *     errorPath="user"
 * )
 */
class GenusScientist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Genus", inversedBy="genusScientists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genus;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="studiedGenuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank()
     */
    private $yearsStudied;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * @param mixed $genus
     */
    public function setGenus($genus)
    {
        $this->genus = $genus;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getYearsStudied()
    {
        return $this->yearsStudied;
    }

    /**
     * @param mixed $yearsStudied
     */
    public function setYearsStudied($yearsStudied)
    {
        $this->yearsStudied = $yearsStudied;
    }


}