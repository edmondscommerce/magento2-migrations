<?php namespace EdmondsCommerce\Migrations\Helper;

use EdmondsCommerce\Migrations\Contracts\WidgetManagerContract;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\ResourceConnection;


class WidgetManager extends AbstractHelper implements WidgetManagerContract
{
    /**
     * @var ResourceConnection
     */
    protected $resourceConnection;

    /**
     * WidgetManager constructor.
     * @param Context $context
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(Context $context, ResourceConnection $resourceConnection)
    {
        parent::__construct($context);
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @param $instanceType
     * @param $themeId
     * @param $title
     * @param $storeIds
     * @param $widgetParameters
     * @return mixed
     */
    public function createWidgetInstance($instanceType, $themeId, $title, $storeIds, $widgetParameters)
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

    /**
     * @param $pageId
     * @param $widgetId
     * @param $layoutHandle
     * @param $blockReference
     * @param $pageTemplate
     * @return void
     */
    public function addWidgetInstanceToPage($pageId, $widgetId, $layoutHandle, $blockReference, $pageTemplate)
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