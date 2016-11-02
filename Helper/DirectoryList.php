<?php namespace EdmondsCommerce\Migrations\Helper;

class DirectoryList extends \Magento\Framework\Filesystem\DirectoryList
{
    public function getCodePath()
    {
        return $this->getPath('app').'/code';
    }

    public function getDesignPath()
    {
        return $this->getPath('app').'/design';
    }
}