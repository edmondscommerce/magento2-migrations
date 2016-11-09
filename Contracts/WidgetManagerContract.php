<?php namespace EdmondsCommerce\Migrations\Contracts;

interface WidgetManagerContract
{
    /**
     * Create a new widget instance
     * @param $instanceType
     * @param $themeId
     * @param $title
     * @param $storeIds
     * @param $widgetParameters
     * @return int The new widget's ID
     */
    public function createWidgetInstance($instanceType, $themeId, $title, $storeIds, $widgetParameters);

    /**
     * Add an existing widget instance to a page
     * @param $pageId
     * @param $widgetId
     * @param $layoutHandle
     * @param $blockReference
     * @param $pageTemplate
     * @return void
     */
    public function addWidgetInstanceToPage($pageId, $widgetId, $layoutHandle, $blockReference, $pageTemplate);

    /**
     * Check that a specific widget exists by the title attribute
     * @param $title
     * @return mixed
     */
    public function widgetExistsByTitle($title);
}