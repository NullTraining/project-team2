<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemRepository")
 * @Vich\Uploadable
 */
class Item
{
    const STATUS_FOUND = 0;
    const STATUS_LOST = 1;
    const STATUS_FOUND_RETURNED = 2;
    const STATUS_LOST_RETURNED = 3;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="Location", inversedBy="item")
     */
    private $location;

    /**
     *  @Vich\UploadableField(mapping="item_image", fileNameProperty="picture", size="pictureSize", originalName="pictureOriginalName")
     *
     * @var File $pictureFile
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $pictureOriginalName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var int
     */
    private $pictureSize;


    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="items")
     */
    private $category;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }


    /**
     * @return string
     */
    public function getPictureOriginalName(): string
    {
        return $this->pictureOriginalName;
    }

    /**
     * @param string $pictureOriginalName
     */
    public function setPictureOriginalName(string $pictureOriginalName): void
    {
        $this->pictureOriginalName = $pictureOriginalName;
    }

    /**
     * @return int
     */
    public function getPictureSize(): int
    {
        return $this->pictureSize;
    }

    /**
     * @param int $pictureSize
     */
    public function setPictureSize(int $pictureSize): void
    {
        $this->pictureSize = $pictureSize;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setPictureFile(?File $image = null): void
    {
        $this->pictureFile = $image;
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }
}