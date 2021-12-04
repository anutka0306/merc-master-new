<?php


namespace App\Service;


use App\Entity\PriceCategory;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;

class PriceCategoryManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getById(int $id): PriceCategory
    {
        $item = $this->entityManager->getRepository(PriceCategory::class)->find($id);
        if (null === $item) {
            throw new LogicException('Не найдена категория прайса с ID: '.$id);
        }
        return $item;
    }
}