<?php namespace EdmondsCommerce\Migrations\Helper\CMS;

use EdmondsCommerce\Migrations\Contracts\CMS\BlockContract;
use EdmondsCommerce\Migrations\Helper\AbstractHelper;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\ObjectManagerInterface;

class Block extends AbstractHelper implements BlockContract
{
    /**
     * @var
     */
    private $blockRepository;

    /**
     * @var
     */
    private $searchCriteriaBuilder;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ObjectManagerInterface $objectManager
    )
    {
        parent::__construct($context);

        $this->blockRepository = $blockRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->objectManager = $objectManager;
    }

    /**
     * @param $identifier
     * @param $content
     */
    public function updateContent($identifier, $content)
    {
        $block = $this->objectManager->create('Magento\Cms\Model\Block');
        $block->load($identifier, 'identifier');
        $block->setContent($content);
        $block->save();
    }

    /**
     * @param array $blocks
     */
    public function massUpdateContent(array $blocks) {
        foreach ($blocks as $identifier => $content) {
            $this->updateContent($identifier, $content);
        }
    }

}