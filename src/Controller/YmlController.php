<?php

namespace App\Controller;

use App\Model\YmlModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YmlController extends AbstractController
{
    /**
     * @var ParameterBagInterface
     */
    protected $params;
    /**
     * @var Filesystem
     */
    protected $filesystem;
    
    public function __construct(ParameterBagInterface $params, Filesystem $filesystem)
    {
        $this->params = $params;
        $this->filesystem = $filesystem;
    }
    /**
     * @Route("/yml_generator", name="yml")
     */
    public function index(YmlModel $model)
    {
        $time_start = time();
        $project_dir = $this->params->get('kernel.project_dir');
        $yml_filename = $project_dir.'/public/yml/index.xml';
        
        $offers         = $model->getOffers();
        $main_page_data = $model->getMainPageData();
        
        $data = $this->renderView('yml/index.xml.twig', [
            'offers'         => $offers,
            'main_page_data' => $main_page_data,
        ]);
        $this->filesystem->dumpFile($yml_filename,$data);
        return new Response('YML-generated. Time: '.(time()-$time_start).' sec');
    }
}
