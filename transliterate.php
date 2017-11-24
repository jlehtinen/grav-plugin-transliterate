<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
class TransliteratePlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized'],
        ];
    }
    /**
     * Initialize configuration.
     */
    public function onPluginsInitialized()
    {
        if ( $this->isAdmin() ) {
            $this->active = false;
            return;
        }
        $this->enable([
            'onTwigExtensions'    => ['onTwigExtensions', 1000],
        ]);
    }
    /**
     * Add all Extensions to twig.
     */
    public function onTwigExtensions()
    {
        require_once(__DIR__ . '/twig/TransliterateTwigFilter.php');
        $this->grav['twig']->twig->addExtension(new TransliterateTwigFilter());
    }
}