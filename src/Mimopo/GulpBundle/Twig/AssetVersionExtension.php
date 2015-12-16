<?php

namespace Mimopo\GulpBundle\Twig;

class AssetVersionExtension extends \Twig_Extension
{
    private $manifestPath;
    private $revManifestPath;

    public function __construct($appDir)
    {
        $this->manifestPath = $appDir . '/Resources/assets/manifest.json';
        $this->revManifestPath = $appDir . '/../var/rev-manifest.json';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('asset_version', array($this, 'getAssetVersion')),
        );
    }

    public function getAssetVersion($asset)
    {
        $paths = $this->readFile($this->revManifestPath);
        if ($paths === false) {
            return $asset;
        }
        $directory = dirname($asset) . '/';
        $file = basename($asset);
        if (!isset($paths[$file])) {
            throw new \Exception(sprintf('There is no file "%s" in the version manifest!', $file));
        }

        return $directory . $paths[$file];
    }

    protected function readFile($path)
    {
        if (!file_exists($path)) {
            return false;
        }
        return json_decode(file_get_contents($path), true);;
    }

    public function getName()
    {
        return 'asset_version';
    }
}
