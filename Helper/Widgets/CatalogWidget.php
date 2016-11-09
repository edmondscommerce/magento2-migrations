<?php namespace EdmondsCommerce\Migrations\Helper\Widgets;

use EdmondsCommerce\Migrations\Contracts\Widgets\CatalogWidgetContract;
use EdmondsCommerce\Migrations\Helper\WidgetManager;
use Magento\CatalogWidget\Block\Product\ProductsListFactory;
use Magento\Framework\App\Helper\Context;

class CatalogWidget extends AbstractWidget implements CatalogWidgetContract
{

    const INSTANCE_TYPE_PRODUCTLIST = "Magento\\CatalogWidget\\Block\\Product\\ProductsList";
    const TEMPLATE_PRODUCTLIST = "product/widget/content/grid.phtml";

    private $productsListFactory;

    public function __construct(Context $context, WidgetManager $widgetManager, ProductsListFactory $productsListFactory)
    {
        parent::__construct($context, $widgetManager);
        $this->productsListFactory = $productsListFactory;
    }

    /**
     * @param $themeId
     * @param $title
     * @param $storeIds
     * @param $widgetParameters
     * @param $pageId
     * @param $layoutHandle
     * @return string
     */
    public function createProductListWidgetAndAssignToPage($themeId, $title, $storeIds, $widgetParameters, $pageId = null, $layoutHandle)
    {
        $widgetInstanceId = $this->widgetManager->createWidgetInstance(self::INSTANCE_TYPE_PRODUCTLIST, $themeId, $title, $storeIds, $widgetParameters);
        $this->widgetManager->addWidgetInstanceToPage($pageId, $widgetInstanceId, $layoutHandle, "content", self::TEMPLATE_PRODUCTLIST);

        return $widgetInstanceId;
    }
}