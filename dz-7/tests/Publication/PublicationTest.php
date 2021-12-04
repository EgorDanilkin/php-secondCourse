<?php

namespace App\Tests\Publication;

use App\Entity\Publication;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PublicationTest extends WebTestCase
{

    public function testSetCreatedAt() {
        $this->assertContainsOnly('DateTimeImmutable', [$this->publication->getCreatedAt()]);
        $this->assertLessThan(date_create_immutable() ,$this->publication->getCreatedAt());
    }

    public function testSortOnDateDesc()
    {
        $publications = Publication::sortOnDateDesc([$this->publicationTwo, $this->publication]);
        $this->assertLessThan($publications[0]->getCreatedAt() ,$publications[1]->getCreatedAt());
    }

    public function testSortOnDateAsc()
    {
        $publications = Publication::sortOnDateAsc([$this->publicationTwo, $this->publication]);
        $this->assertLessThan($publications[1]->getCreatedAt() ,$publications[0]->getCreatedAt());
    }

    protected function SetUp(): void
    {
        $this->publication = new Publication();
        $this->publication
            ->setTitle('testTitle')
            ->setText('testText')
            ->setAuthor('testAuthor');

        $this->publicationTwo = new Publication();
        $this->publicationTwo
            ->setTitle('testTitleTwo')
            ->setText('testTextTwo')
            ->setAuthor('testAuthorTwo');
    }
}