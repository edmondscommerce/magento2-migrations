<?php namespace EdmondsCommerce\Migrations\Contracts\Catalog;

use Magento\Catalog\Model\Category;

interface CategoryContract
{
    /**
     * Get the root category for a store
     * @param int $storeId
     * @return string
     */
    public function getRootCategoryId($storeId = null);

    public function createCategory($name, $parentId = null, $active = true, $includeInMenu = true);

    /**
     * Check if a category exists
     * @param string $name
     * @param int $parentId
     * @return bool
     */
    public function categoryExists($name, $parentId = null);


    /**
     * Get an array of categories by category name
     * @param string $name
     * @param int $parentId
     * @return Category
     */
    public function findCategoryByName($name, $parentId = null);

}