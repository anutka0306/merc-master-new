<?php


namespace App\Service;


use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Finder\Finder;

class FileManager
{
    private $server_root;

    public function __construct(ParameterBagInterface $params)
    {
        $this->server_root = $params->get('kernel.project_dir') . '/' . $params->get('web_root');
    }

    public function download(string $link, string $folder): void
    {
        $content = file_get_contents($link);
        $filename = pathinfo($link, PATHINFO_BASENAME);
        $folder = $folder === '/' ? '' : ('/' . trim($folder, '/'));
        $destination = $this->server_root . $folder;
        if (!is_readable($destination) && !mkdir($destination, 0777, true) && !is_dir($destination)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination));
        }
        file_put_contents($destination. '/' . $filename, $content);
    }

    public function upload(string $pathToFile, string $content): void
    {
        $destination = $this->server_root . $pathToFile;
        file_put_contents($destination, $content);
    }

    public function getFilesFromFolder(string $folder,int $limit = 0): array
    {
        if (empty($folder)) {
            return [];
        }
        $folder = '/' . trim($folder, ' /');
        $full_path = $this->server_root . $folder;
        if (!file_exists($full_path)) {
            return [];
        }
        $finder = new Finder();
        $finder->files()->in($full_path)->sortByName(true);
        $files = [];
        foreach ($finder as $file) {
            $files[] = $folder . '/' . $file->getRelativePathname();
        }
        if ($limit > 0) {
            return array_slice($files,0, $limit);
        }
        return $files;
    }
}