<?php
namespace DiscountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="DiscountBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @Assert\Type("string")
     */
    private $title;

    /**
     * @var File $picture
     *
     * @ORM\Column(name="picture", type="text", nullable=true)
     * @Assert\File(
     *          maxSize = "2M",
     *          mimeTypes={"image/jpg", "image/jpeg", "image/png"},
     *          maxSizeMessage="Fichier trop lourd",
     *          mimeTypesMessage="Le fichier doit être en jpg ou png")
     */
    private $picture;

    /**
     * @var string
     * @ORM\Column(name="current_price", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $currentPrice;

    /**
     * @var string
     * @ORM\Column(name="new_price", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $newPrice;

     /**
     * @var integer
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     * @Assert\Type("integer")
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="discount_type", type="boolean", nullable=false)
     */
    private $discountType;

    /**
     * @var string
     * @ORM\Column(name="discount_value", type="decimal", precision=5, scale=2, nullable=false)
     * @Assert\Type("float")
     */
    private $discountValue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_week", type="datetime")
     */
    private $dateWeek;

    /**
     * @var string
     *
     * @ORM\Column(name="id_product", type="string", length=125)
     */
    private $idProduct;


    /**
     * @var integer
     *
     * @ORM\Column(name="camp_live_id", type="integer", nullable=false)
     */
    private $campLiveId;

    /**
     * @var string
     *
     * @ORM\Column(name="concatenation", type="string", length=125)
     */
     private $concatenation;

    /**
    * @var boolean
    *
    * @ORM\Column(name="product_visibility", type="boolean")
    */
    private $productVisibility;

    /**
    * @var string
    *
    * @ORM\Column(name="picture_name", type="string", length=125, nullable=true)
    * @Assert\Type("string")
    */
    private $pictureName;

    /**
    * @var integer
    *
    * @ORM\Column(name="priority", type="integer", nullable=true)
    * @Assert\Type("string")
    */
    private $priority;    
    
    
    /**
    * @var string
    *
    * @ORM\Column(name="key_product", type="string", nullable=true)
    * @Assert\Type("string")
    */
    private $keyProduct;





    public function __construct()
    {
        $this->dateWeek = new \DateTime();
    }
     /**
     * Get the string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getDateWeek();
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
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }


    /**
     * Set currentPrice
     *
     * @param string $currentPrice
     *
     * @return Product
     */
    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
        return $this;
    }

    /**
     * Get currentPrice
     *
     * @return string
     */
    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    /**
     * Set newPrice
     *
     * @param string $newPrice
     *
     * @return Product
     */
    public function setNewPrice($newPrice)
    {
        $this->newPrice = $newPrice;
        return $this;
    }

    /**
     * Get newPrice
     *
     * @return string
     */
    public function getNewPrice()
    {
        return $this->newPrice;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set discountType
     *
     * @param boolean $discountType
     *
     * @return Product
     */
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;
        return $this;
    }

    /**
     * Get discountType
     *
     * @return boolean
     */
    public function getDiscountType()
    {
        return $this->discountType;
    }

     /**
     * Set discountValue
     *
     * @param string $discountValue
     *
     * @return Product
     */
    public function setDiscountValue($discountValue)
    {
        $this->discountValue = $discountValue;
        return $this;
    }

    /**
     * Get discountValue
     *
     * @return string
     */
    public function getDiscountValue()
    {
        return $this->discountValue;
    }

    /**
     * Set dateWeek
     *
     * @param string $dateWeek
     *
     * @return Product
     */
    public function setDateWeek(\DateTime $dateWeek)
    {
        $this->dateWeek = $dateWeek;
        return $this;
    }

    /**
     * Get dateWeek
     *
     * @return string
     */
    public function getDateWeek()
    {
        return $this->dateWeek;
    }

    /**
     * Set idProduct
     *
     * @param string $idProduct
     *
     * @return Product
     */
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
        return $this;
    }

    /**
     * Get idProduct
     *
     * @return string
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Set campLiveId
     *
     * @param integer $campLiveId
     *
     * @return Product
     */
    public function setCampLiveId($campLiveId)
    {
        $this->campLiveId = $campLiveId;

        return $this;
    }

    /**
     * Get campLiveId
     *
     * @return integer
     */
    public function getCampLiveId()
    {
        return $this->campLiveId;
    }


    /**
     * Set concatenation
     *
     * @param string $concatenation
     *
     * @return Product
     */
    public function setConcatenation($concatenation)
    {
        $this->concatenation = $concatenation;

        return $this;
    }

    /**
     * Get concatenation
     *
     * @return string
     */
    public function getConcatenation()
    {
        return $this->concatenation;
    }

    /**
     * Set productVisibility
     *
     * @param bool $productVisibility
     *
     * @return Product
     */
    public function setProductVisibility($productVisibility)
    {
        $this->productVisibility = $productVisibility;

        return $this;
    }

    /**
     * Get productVisibility
     *
     * @return bool
     */
    public function getProductVisibility()
    {
        return $this->productVisibility;
    }


    /**
     * Set pictureName
     *
     * @param string $pictureName
     *
     * @return Product
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * Get pictureName
     *
     * @return string
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Product
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

     /**
     * Set keyProduct
     *
     * @param string $keyProduct
     *
     * @return Product
     */
    public function setKeyProduct($keyProduct)
    {
        $this->keyProduct = $keyProduct;

        return $this;
    }

    /**
     * Get keyProduct
     *
     * @return string
     */
    public function getKeyProduct()
    {
        return $this->keyProduct;
    }
}
