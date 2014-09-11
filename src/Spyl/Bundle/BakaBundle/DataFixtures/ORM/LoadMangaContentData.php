<?php

namespace Spyl\Bundle\BakaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Spyl\Bundle\BakaBundle\Model\Content;

class LoadMangaContentData extends AbstractFixture implements DependentFixtureInterface
{
    public $data = [
        [
            "id" => "tome-01",
            "manga" => "naruto",
            "name" => "Tome 01",
        ],
        [
            "id" => "tome-02",
            "manga" => "naruto",
            "name" => "Tome 02",
        ],
        [
            "id" => "tome-01",
            "manga" => "death-note",
            "name" => "Tome 01",
        ]
    ];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        foreach ($this->data as $contentData) {
            $content = new Content;
            $content
                ->setId($contentData['id'])
                ->setManga($this->getReference('manga.'.$contentData['manga']))
                ->setName($contentData['name'])
                ;
            $manager->persist($content);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getDependencies()
    {
        return [
            'Spyl\Bundle\BakaBundle\DataFixtures\ORM\LoadMangaData',
        ];
    }
}
