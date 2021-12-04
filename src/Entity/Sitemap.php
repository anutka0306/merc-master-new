<?php

namespace App\Entity;

use App\Repository\SitemapRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SitemapRepository::class)
 */
class Sitemap extends Content
{

}
