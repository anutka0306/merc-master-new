<?php


namespace App\Service;

use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\District;
use App\Entity\SubwayStation;
use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\RootService;
use App\Entity\Salon;
use App\Entity\Service;
use App\Entity\Contracts\PageInterface;
use App\Repository\SalonRepository;

class SalonManager
{
    /**
     * @var SalonRepository
     */
    private $salonRepository;
    /**
     * @var array|Salon[]
     */
    private $availableSalons = [];

    public function __construct(SalonRepository $salonRepository)
    {
        $this->salonRepository = $salonRepository;
    }

    /**
     * @param PageInterface|null $content
     * @return array|Salon[]
     */
    public function getSalonsByPage(?PageInterface $content): array
    {
        if (!empty($this->availableSalons)) {
            return $this->availableSalons;
        }
        //$allSalons = $this->salonRepository->findAllWithExcludes();
        $allSalons = $this->salonRepository->findAllPublishedWithExcludes();
        if (null === $content || !in_array(get_class($content), [
                Brand::class,
                Model::class,
                Service::class,
                RootService::class
            ])) {
            foreach ($allSalons as $availableSalon) {
                $availableSalon->setAlias(str_replace('BRAND','',$availableSalon->getAlias()));
            }
            return $allSalons;
        }
        $this->availableSalons = array_filter($allSalons, function (Salon $salon) use ($content) {
            if ($content->getPriceBrand() && $salon->getExcludedBrands()->contains($content->getPriceBrand())) {
                return false;
            }
            if ($content->getPriceModel() && $salon->getExcludedModels()->contains($content->getPriceModel())) {
                return false;
            }
            if ($content->getService() && $salon->getExcludedServices()->contains($content->getService())) {
                return false;
            }

            return true;
        });
        foreach ($this->availableSalons as $availableSalon) {
            $availableSalon->setAlias(str_replace('BRAND',$content->getBrandName(),$availableSalon->getAlias()));
        }
        return $this->availableSalons;
    }

    public function getSalonsByFilterForm($form, $priceBrand)
    {
    	//$allSalons = $this->salonRepository->findAllPublishedWithExcludesAndLocations();
    	if ($form->isSubmitted() && $form->isValid()) {
	        $data = $form->getData();
	        if ($priceBrand) {
	            ['priceModel' => $priceModel, 'priceService' => $priceService, 'district' => $district, 'subwayStation' => $subwayStation] = $data;
	        } else {
	            ['priceBrand' => $priceBrand, 'priceModel' => $priceModel, 'priceService' => $priceService, 'district' => $district, 'subwayStation' => $subwayStation] = $data;
	        }

	        $allSalons = $this->salonRepository->findAllPublishedWithExcludesAndLocations();

	        return array_filter($allSalons, function (Salon $salon) use ($priceBrand, $priceModel, $priceService, $district, $subwayStation) {
	            if ($priceBrand && $salon->getExcludedBrands()->contains($priceBrand)) {
	                return false;
	            }
	            if ($priceModel && $salon->getExcludedModels()->contains($priceModel)) {
	                return false;
	            }
	            if ($priceService && $salon->getExcludedServices()->contains($priceService)) {
	                return false;
	            }
	            if ($district && !$salon->getDistricts()->contains($district)) {
	                return false;
	            }
	            if ($subwayStation && !$salon->getSubwayStations()->contains($subwayStation)) {
	                return false;
	            }
	            return true;
	        });
	    }
        return [];

	    /*if ($priceBrand) {
		    return array_filter($allSalons, function (Salon $salon) use ($priceBrand) {
	            if ($priceBrand && $salon->getExcludedBrands()->contains($priceBrand)) {
	                return false;
	            }
	            return true;
	        });
		}
	    return $this->salonRepository->findBy(['published' => true]);*/
    }

    public function getSalonsByFilter($data, $priceBrand)
    {
            if ($priceBrand) {
                ['priceModel' => $priceModel, 'priceService' => $priceService, 'district' => $district, 'subwayStation' => $subwayStation] = $data;
            } else {
                ['priceBrand' => $priceBrand, 'priceModel' => $priceModel, 'priceService' => $priceService, 'district' => $district, 'subwayStation' => $subwayStation] = $data;
            }

            $allSalons = $this->salonRepository->findAllPublishedWithExcludesAndLocations();

            return array_filter($allSalons, function (Salon $salon) use ($priceBrand, $priceModel, $priceService, $district, $subwayStation) {
                if ($priceBrand && $salon->getExcludedBrands()->contains($priceBrand)) {
                    return false;
                }
                if ($priceModel && $salon->getExcludedModels()->contains($priceModel)) {
                    return false;
                }
                if ($priceService && $salon->getExcludedServices()->contains($priceService)) {
                    return false;
                }
                if ($district && !$salon->getDistricts()->contains($district)) {
                    return false;
                }
                if ($subwayStation && !$salon->getSubwayStations()->contains($subwayStation)) {
                    return false;
                }
                return true;
            });
    }
}