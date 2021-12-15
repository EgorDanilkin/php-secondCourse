<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{

    public function __construct()
    {
        $this->setCreatedAt();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    protected function setCreatedAt(): self
    {
        $this->createdAt = date_create_immutable('now');

        return $this;
    }

    /**
     * @param array $publications
     * @return array
     */
    public static function sortOnDateDesc(array $publications): array
    {
        usort($publications, function ($a, $b){
            if ($a->getCreatedAt() == $b->getCreatedAt()) {
                return 0;
            }
            return ($a->getCreatedAt() < $b->getCreatedAt()) ? 1 : -1;
        });
        return $publications;
    }

    /**
     * @param array $publications
     * @return array
     */
    public static function sortOnDateAsc(array $publications): array
    {
        usort($publications, function ($a, $b){
            if ($a->getCreatedAt() == $b->getCreatedAt()) {
                return 0;
            }
            return ($a->getCreatedAt() > $b->getCreatedAt()) ? 1 : -1;
        });
        return $publications;
    }
}
