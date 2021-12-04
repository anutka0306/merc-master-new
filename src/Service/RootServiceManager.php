<?php


namespace App\Service;


use App\Entity\RootService;
use Doctrine\ORM\EntityManagerInterface;

class RootServiceManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var PriceCategoryManager
     */
    private $priceCategoryManager;

    /**
     * @param EntityManagerInterface $entityManager
     * @param PriceCategoryManager $priceCategoryManager
     */
    public function __construct(EntityManagerInterface $entityManager,PriceCategoryManager $priceCategoryManager)
    {
        $this->entityManager = $entityManager;
        $this->priceCategoryManager = $priceCategoryManager;
    }

    /**
     * @param int $categoryId
     * @return RootService[]|array
     */
    public function getRootServicePagesOfPriceCategory(int $categoryId):array
    {
        $priceCategory = $this->priceCategoryManager->getById($categoryId);

        $categoriesIds[] = $priceCategory->getId();
        if (!$priceCategory->getChildren()->isEmpty()) {
            foreach ($priceCategory->getChildren() as $child) {
                $categoriesIds[] =  $child->getId();
            }
        }
        return $this->entityManager->getRepository(RootService::class)->findByPriceCategories($categoriesIds);
    }
}