<?php
/**
 * Image Server plugin for Craft CMS
 *
 * ImageServer Controller
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   ImageServer
 * @since     1.0.0
 */

namespace Craft;

class ImageServerController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array('actionIndex',
        );

    /**
     */
    public function actionIndex()
    {
        craft()->imageServer->saveSourceMapping();
        craft()->end();
    }
}