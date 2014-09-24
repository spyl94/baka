<?php

namespace Spyl\Bundle\BakaBundle\Model;

class Content
{
	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

    /**
     * @var string
     */
    private $visibility;

	/**
	 * @var \Spyl\Bundle\BakaBundle\Model\Manga
	 */
	private $manga;

    /**
     * Gets the value of id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param string $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of visibility.
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Sets the value of visibility.
     *
     * @param string $visibility the visibility
     *
     * @return self
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Gets the value of manga.
     *
     * @return \Spyl\Bundle\BakaBundle\Model\Manga
     */
    public function getManga()
    {
        return $this->manga;
    }

    /**
     * Sets the value of manga.
     *
     * @param \Spyl\Bundle\BakaBundle\Model\Manga $manga the manga
     *
     * @return self
     */
    public function setManga(\Spyl\Bundle\BakaBundle\Model\Manga $manga)
    {
        $this->manga = $manga;

        return $this;
    }
}
