<?php namespace EdmondsCommerce\Migrations\Contracts\CMS;


interface BlockContract
{
    public function updateContent($identifier, $content);

    public function massUpdateContent(array $blocks);
}