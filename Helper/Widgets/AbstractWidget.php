<?php namespace EdmondsCommerce\Migrations\Helper\Widgets;

use EdmondsCommerce\Migrations\Helper\AbstractHelper;
use EdmondsCommerce\Migrations\Helper\WidgetManager;
use Magento\Framework\App\Helper\Context;

abstract class AbstractWidget extends AbstractHelper
{
    /**
     * @var WidgetManager
     */
    protected $widgetManager;

    public function __construct(Context $context, WidgetManager $widgetManager)
    {
        parent::__construct($context);
        $this->widgetManager = $widgetManager;
    }
}