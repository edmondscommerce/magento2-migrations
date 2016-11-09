<?php namespace EdmondsCommerce\Migrations\Helper\Widgets;

use EdmondsCommerce\Migrations\Contracts\Widgets\CatalogWidgetContract;
use EdmondsCommerce\Migrations\Helper\WidgetManager;
use Magento\CatalogWidget\Block\Product\ProductsListFactory;
use Magento\Framework\App\Helper\Context;

class Catalog extends AbstractWidget implements CatalogWidgetContract
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
     */
    public function createProductListWidgetAndAssignToPage($themeId, $title, $storeIds, $widgetParameters, $pageId = null, $layoutHandle)
    {
        $widgetInstanceId = $this->createWidgetInstanceBySql(self::INSTANCE_TYPE_PRODUCTLIST, $themeId, $title, $storeIds, $widgetParameters);
        $this->addWidgetInstanceToPageBySql($pageId, $widgetInstanceId, $layoutHandle, "content", self::TEMPLATE_PRODUCTLIST);

        return $widgetInstanceId;
    }
}