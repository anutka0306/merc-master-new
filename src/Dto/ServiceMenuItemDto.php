<?php


namespace App\Dto;


use App\Entity\RootService;

class ServiceMenuItemDto
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var RootService[]
     */
    public $items;
    /**
     * @var string
     */
    public $mainLink;

    /**
     * @param string $name
     * @param RootService[] $items
     * @param string $mainLink
     */
    public function __construct(string $name, array $items, string $mainLink)
    {
        $this->name = $name;
        $this->items = $items;
        $this->mainLink = $mainLink;
    }

}