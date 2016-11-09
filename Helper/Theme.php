<?php namespace EdmondsCommerce\Migrations\Helper;

use Magento\Framework\App\Helper\Context;

class Theme extends AbstractHelper
{
    public function __construct(Context $context, \Magento\Theme\Helper\Theme $theme)
    {
        parent::__construct($context);
    }


}