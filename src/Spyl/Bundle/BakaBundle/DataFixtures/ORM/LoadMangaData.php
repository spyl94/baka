<?php

namespace Spyl\Bundle\BakaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Spyl\Bundle\BakaBundle\Model\Manga;

class LoadMangaData extends AbstractFixture implements OrderedFixtureInterface
{
    public $data = [
        [
            "id" => "naruto",
            "name" => "Naruto",
            "image" => "img1"
        ],
        [
            "id" => "one-piece",
            "name" => "One Piece",
            "image" => "img2"
        ],
        [
            "id" => "death-note",
            "name" => "Death Note",
            "image" => "img3"
        ]
    ];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        foreach ($this->data as $mangaData) {
            $manga = new Manga;
            $manga
                ->setId($mangaData['id'])
                ->setName($mangaData['name'])
                ->setImage($mangaData['image'])
                ;
            $manager->persist($manga);
            $this->addReference('manga.'.$manga->getId(), $manga);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}