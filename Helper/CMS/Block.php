<?php namespace EdmondsCommerce\Migrations\Helper\CMS;

use EdmondsCommerce\Migrations\Contracts\CMS\BlockContract;
use EdmondsCommerce\Migrations\Helper\AbstractHelper;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Model\BlockFactory;
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

    /**
     * @var BlockFactory
     */
    private $blockFactory;

    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        BlockFactory $blockFactory
    )
    {
        parent::__construct($context);

        $this->blockRepository = $blockRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->blockFactory = $blockFactory;
    }

    /**
     * @param $identifier
     * @param $content
     * @todo Load and save are deprecated, would be great to replace it with BlockRepository
     */
    public function updateContent($identifier, $content)
    {
        $block = $this->blockFactory->create();
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