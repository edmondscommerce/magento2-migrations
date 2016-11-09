<?php namespace EdmondsCommerce\Migrations\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\CatalogWidget\Block\Product\ProductsListFactory;
use Magento\Framework\App\Helper\Context;

class CatalogWidget extends AbstractHelper
{

    const INSTANCE_TYPE_PRODUCTLIST = "Magento\\CatalogWidget\\Block\\Product\\ProductsList";
    const TEMPLATE_PRODUCTLIST = "product/widget/content/grid.phtml";

    private $productsListFactory;
    private $resourceConnection;

    public function __construct(
        Context $context,
        ProductsListFactory $productsListFactory,
        \Magento\Framework\App\ResourceConnection $resourceConnection
    )
    {
        parent::__construct($context);
        $this->productsListFactory = $productsListFactory;
        $this->resourceConnection = $resourceConnection;
    }

    public function createProductListWidget()
    {
        /** @var \Magento\CatalogWidget\Block\Product\ProductsList $productListWidget */
        $data = array();

        $data['title'] = "New Products";
        $data['products_count'] = "4";
        $data['template'] = "product/widget/content/grid.phtml";
        $data['conditions_encoded'] = "a:2:[i:1;a:4:[s:4:`type`;s:50:`Magento|CatalogWidget|Model|Rule|Condition|Combine`;s:10:`aggregator`;s:3:`all`;s:5:`value`;s:1:`1`;s:9:`new_child`;s:0:``;]s:4:`1--1`;a:4:[s:4:`type`;s:50:`Magento|CatalogWidget|Model|Rule|Condition|Product`;s:9:`attribute`;s:12:`category_ids`;s:8:`operator`;s:2:`==`;s:5:`value`;s:2:`31`;]]";
        $productListWidget = $this->productsListFactory->create(array());
        foreach ($data as $name => $value)
        {
            $productListWidget->setData($name, $value);
        }
    }

    public function createProductListWidgetBySql(
        $themeId,
        $title,
        $storeIds,
        $widgetParameters,
        $pageId,
        $layoutHandle
    )
    {
        $conn = $this->resourceConnection->getConnection();
        $widgetInstanceId = $this->createWidgetInstanceBySql(self::INSTANCE_TYPE_PRODUCTLIST, $themeId, $title, $storeIds, $widgetParameters);
        $this->addWidgetInstanceToPageBySql($pageId, $widgetInstanceId, $layoutHandle, "content", self::TEMPLATE_PRODUCTLIST);

    }

    private function createWidgetInstanceBySql(
        $instanceType,
        $themeId,
        $title,
        $storeIds,
        $widgetParameters
    )
    {
        $conn = $this->resourceConnection->getConnection();

        $values = array();
        $values['instance_type'] = $instanceType;
        $values['theme_id'] = $themeId;
        $values['title'] = $title;
        $values['store_ids'] = $storeIds;
        $values['widget_parameters'] = $widgetParameters;
        $values['sort_order'] = 0;

        $conn->insert('widget_instance', $values);

        $widgetInstanceId = $conn->lastInsertId();

        return $widgetInstanceId;
    }

    private function addWidgetInstanceToPageBySql(
        $pageId,
        $widgetId,
        $layoutHandle,
        $blockReference,
        $pageTemplate
    )
    {
        $conn = $this->resourceConnection->getConnection();

        $values = array();
        $values['instance_id'] = $widgetId;
        $values['page_group'] = "pages";
        $values['layout_handle'] = $layoutHandle;
        $values['block_reference'] = $blockReference;
        $values['page_for'] = "all";
        $values['entities'] = "";
        $values["page_template"] = $pageTemplate;

        $conn->insert('widget_instance_page', $values);
    }

    public function widgetExistsByTitle($title)
    {
        $conn = $this->resourceConnection->getConnection();

        $select = $conn->select()->from('widget_instance')->where('title = "' . $title . '"', "string");
        $result = $conn->fetchAll($select);
        if (sizeof($result) > 0)
        {
            return true;
        }

        return false;
    }


}