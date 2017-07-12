<?php
/**
 * Image Server plugin for Craft CMS
 *
 * ImageServer Service
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   ImageServer
 * @since     1.0.0
 */

namespace Craft;

class ImageServerService extends BaseApplicationComponent
{
    /**
     */
    public function saveServerMapping()
    {
        $sources = [];
        $path = PUBPATH . 'imageserver';

        foreach (craft()->assetSources->getAllSources() as $source) {
            $sources[$source->id] = [
                'id' => $source->id,
                'name' => $source->name,
                'handle' => $source->handle,
                'type' => $source->type,
                'path' => $source->getSourceType()->getBasePath(),
                'settings' => array_map(function($setting) {

                }, $source->settings),
            ];
        }

        $settings = [
            'sources' => $sources,
            'cachePath' => craft()->config->get('cachePath', 'imageserver'),
        ];
        
        IOHelper::ensureFolderExists($path);
        IOHelper::writeToFile($path . 'settings.json', json_encode($settings));
    }

}