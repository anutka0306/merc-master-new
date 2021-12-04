<?php

namespace App\Entity;

use App\Repository\ServiceWithoutRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceWithoutRepository::class)
 */
class ServiceWithout extends Content
{

}
