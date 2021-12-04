<?php


namespace App\Service;


use App\Entity\Content;
use App\Entity\Naschiraboty;
use App\Entity\ServiceEntityReedInterface;
use App\Repository\NaschirabotyRepository;

class NaschirabotyManager
{
    /**
     * @var NaschirabotyRepository
     */
    private $naschirabotyRepository;

    /**
     * @param NaschirabotyRepository $naschirabotyRepository
     */
    public function __construct(NaschirabotyRepository $naschirabotyRepository)
    {
        $this->naschirabotyRepository = $naschirabotyRepository;
    }

    public function getItems(?Content $content):array
    {
        $items = $this->naschirabotyRepository->findBy([],['sort'=>'asc','id'=>'desc']);
        if (null === $content || !$content instanceof ServiceEntityReedInterface) {
            return $items;
        }
        $service = $content->getService();
        if (!$service) {
            return $items;
        }
        usort($items, static function(Naschiraboty $a,Naschiraboty $b ) use($service){
            if ($a->getPriceServices()->contains($service) && $b->getPriceServices()->contains($service) ) {
                return ($a->getId() > $b->getId()) ? -1 : 1;
            }
            if ($a->getPriceServices()->contains($service)) {
                return -1;
            }
            if ($b->getPriceServices()->contains($service)) {
                return 1;
            }
            return ($a->getId() > $b->getId()) ? -1 : 1;
        });

        return $items;
    }
}