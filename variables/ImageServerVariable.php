<?php
/**
 * Image Server plugin for Craft CMS
 *
 * Image Server Variable
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   ImageServer
 * @since     1.0.0
 */

namespace Craft;

class ImageServerVariable
{
    /**
     */
    public function transform($image = null)
    {
        return CRAFT_SITE_URL . 'server/index.php?source=' . $image->getSource()->id . '&image=' . $image->getPath();
    }
}