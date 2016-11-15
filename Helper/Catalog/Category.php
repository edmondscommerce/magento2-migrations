<?php namespace EdmondsCommerce\Migrations\Helper\Catalog;

use EdmondsCommerce\Migrations\Contracts\Catalog\CategoryContract;
use EdmondsCommerce\Migrations\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\CategoryFactory;

class Category extends AbstractHelper implements CategoryContract {

    protected $objectManager;
    protected $storeManager;
    /**
     * @var CategoryFactory
     */
    private $categoryFactory;

    public function __construct(
        Context $context,
        ObjectManagerInterface $objectManager,
        StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory
    )
    {
        parent::__construct($context);
        $this->objectManager = $objectManager;
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
    }

    public function getRootCategoryId($storeId = null) {
        /** @var \Magento\Store\Model\Store $store */
        $store = null;
        if($storeId)
        {
            $store = $this->storeManager->getStore($storeId);
        }
        else
        {
            $store = $this->storeManager->getStore();
        }

        $rootCategoryId = $store->getRootCategoryId();
        return $rootCategoryId;
    }

    public function createCategory($name, $parentId = null, $active = true, $includeInMenu = true)
    {
        $rootCategoryId = $this->storeManager->getStore()->getRootCategoryId();
        if(is_null($parentId)) {
            $parentId = $rootCategoryId;
        }

        $category = $this->objectManager->create('Magento\Catalog\Model\Category', ['data' =>[
            "parent_id" => $rootCategoryId,
            "name" => $name,
            "is_active" => $active,
            "position" => 2,
            "include_in_menu" => $includeInMenu
        ]]);

        $repository = $this->objectManager->get(\Magento\Catalog\Api\CategoryRepositoryInterface::class);
        $repository->save($category);
    }

    public function categoryExists($name, $parentId = null)
    {

        $category = $this->findCategoryByName($name, $parentId = null);

        return !is_null($category);
    }

    public function findCategoryByName($name, $parentId = null)
    {

        $categoryCollection = $this->categoryFactory->create()->getCollection();
        $categoryResults = $categoryCollection->addAttributeToFilter('name', $name);
        $firstCategory = $categoryResults->setPageSize(1)->getFirstItem();


        if(is_null($parentId)) {
            $parentId = $rootCategoryId = $this->storeManager->getStore()->getRootCategoryId();
        }


        $categoryId = $firstCategory->getId();
        if(!isset($categoryId)) {
            return null;
        }

        if($firstCategory->getParentId() != $parentId) {
            return null;
        }

        return $firstCategory;
    }

}