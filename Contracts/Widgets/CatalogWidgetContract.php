<?php namespace EdmondsCommerce\Migrations\Contracts\Widgets;

interface CatalogWidgetContract
{
    /**
     * @return
     * @internal param $themeId
     * @internal param $title
     * @internal param $storeIds
     * @internal param $widgetParameters
     * @internal param $pageId
     * @internal param $layoutHandle
     * @deprecated
     */
    public function createProductListWidgetAndAssignToPage($themeId, $title, $storeIds, $widgetParameters, $pageId, $layoutHandle);
}