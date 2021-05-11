<?php

namespace ByTIC\Form\HtmlEditors\Utility;

use ByTIC\Assets\Assets;

/**
 * Class AssetsEditorsInit
 * @package ByTIC\Form\HtmlEditors\Utility
 */
class AssetsEditorsInit
{
    /**
     * @param null $assetName
     * @param null $base
     * @throws \Exception
     */
    public static function init($assetName = null, $base = null)
    {
        $assetName = static::protectAssetName($assetName);
        $assetEntry = Assets::entry();
        Assets::entry()->scripts()->addRaw(form_html_view_init());
        if (assets_manager()->hasEntrypoint($assetName)) {
            $assetEntry->addFromWebpack($assetName);
            Assets::entry()->scripts()->add($base . '/init.js');
            return;
        }
        if (\Nip\Utility\Url::isValid($base)) {
            Assets::entry()->scripts()->add($base . '/jquery.tinymce.min.js');
            Assets::entry()->scripts()->add($base . '/tinymce.min.js');
            Assets::entry()->scripts()->add($base . '/init.js');
            return;
        }
        Assets::entry()->scripts()->add($base . '/jquery.tinymce.min');
        Assets::entry()->scripts()->add($base . '/tinymce.min');
        Assets::entry()->scripts()->add($base . '/init');
    }

    /**
     * @param null $assetName
     * @return mixed|string
     */
    protected static function protectAssetName($assetName = null)
    {
        return $assetName ? $assetName : "tinymce";
    }
}
