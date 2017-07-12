<?php

namespace DiscountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * ShowProduct
 *
 * @ORM\Table(name="show_product")
 * @ORM\Entity(repositoryClass="DiscountBundle\Repository\ShowProductRepository")
 */
class ShowProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="show_current_price", type="decimal", precision=5, scale=2)
     */
    private $showCurrentPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="show_date_week", type="datetime")
     */
    private $showDateWeek;

    /**
     * @var string
     *
     * @ORM\Column(name="show_id_product", type="string", length=125)
     */
    private $showIdProduct;
    
    /**
     * @var string
     *
     * @ORM\Column(name="show_concatenation", type="string", length=125)
     */
     private $showConcatenation;

    /**
      * @var string
      *
      * @ORM\Column(name="show_camp_live_id", type="integer", nullable=false)
      */
    private $showCampLiveId;


    /**
      * @var string
      *
      * @ORM\Column(name="show_wording", type="string", nullable=true)
      */
    private $showWording;
     


    public function __construct()
   {
       $this->showDateWeek = new \DateTime();
   }
     /**
     * Get the string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getShowDateWeek();
    }

    /**
     * Get id
     *
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set showCurrentPrice
     *
     * @param string $showCurrentPrice
     *
     * @return ShowProduct
     */
    public function setShowCurrentPrice($showCurrentPrice)
    {
        $this->showCurrentPrice = $showCurrentPrice;

        return $this;
    }

    /**
     * Get showCurrentPrice
     *
     * @return string
     */
    public function getShowCurrentPrice()
    {
        return $this->showCurrentPrice;
    }

    /**
     * Set showDateWeek
     *
     * @param \DateTime $showDateWeek
     *
     * @return ShowProduct
     */
    public function setShowDateWeek(\DateTime $showDateWeek)
    {
        $this->showDateWeek = $showDateWeek;

        return $this;
    }

    /**
     * Get showDateWeek
     *
     * @return \DateTime
     */
    public function getShowDateWeek()
    {
        return $this->showDateWeek;
    }

    /**
     * Set showIdProduct
     *
     * @param string $showIdProduct
     *
     * @return ShowProduct
     */
    public function setShowIdProduct($showIdProduct)
    {
        $this->showIdProduct = $showIdProduct;

        return $this;
    }

    /**
     * Get showIdProduct
     *
     * @return string
     */
    public function getShowIdProduct()
    {
        return $this->showIdProduct;
    }


    /**
     * Set showConcatenation
     *
     * @param string $showConcatenation
     *
     * @return ShowProduct
     */
    public function setShowConcatenation($showConcatenation)
    {
        $this->showConcatenation = $showConcatenation;

        return $this;
    }

    /**
     * Get showConcatenation
     *
     * @return string
     */
    public function getShowConcatenation()
    {
        return $this->showConcatenation;
    }


    /**
     * Set showCampLiveId
     *
     * @param integer $showCampLiveId
     *
     * @return ShowProduct
     */
    public function setShowCampLiveId($showCampLiveId)
    {
        $this->showCampLiveId = $showCampLiveId;

        return $this;
    }

    /**
     * Get showCampLiveId
     *
     * @return integer
     */
    public function getShowCampLiveId()
    {
        return $this->showCampLiveId;
    }

    /**
     * Set showWording
     *
     * @param string $showWording
     *
     * @return ShowProduct
     */
    public function setShowWording($showWording)
    {
        $this->showWording = $showWording;

        return $this;
    }

    /**
     * Get showWording
     *
     * @return string
     */
    public function getShowWording()
    {
        return $this->showWording;
    }
}
