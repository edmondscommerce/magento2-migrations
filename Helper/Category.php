<?php namespace EdmondsCommerce\Migrations\Helper;

class Category extends AbstractHelper {

    protected $objectManager;
    protected $storeManager;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context);
        $this->objectManager = $objectManager;
        $this->storeManager = $storeManager;
    }

    public function getRootCategoryId() {
        $rootCategoryId = $this->storeManager->getStore()->getRootCategoryId();
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
        $categoryModel = $this->objectManager
            ->create('Magento\Catalog\Model\Category');
        $category = $categoryModel->getCollection()
            ->addAttributeToFilter('name', $name)
            ->getFirstItem();


        if(is_null($parentId)) {
            $parentId = $rootCategoryId = $this->storeManager->getStore()->getRootCategoryId();
        }

        $categoryId = $category->getId();
        if(!isset($categoryId)) {
            return false;
        }

        if($category->getParentId() != $parentId) {
            return false;
        }

        return true;
    }

}