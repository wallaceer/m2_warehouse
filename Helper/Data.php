<?php

namespace Ws\Warehouse\Helper;

use Magento\Framework\Api\SearchCriteriaBuilderFactory;
use Magento\InventoryApi\Api\SourceRepositoryInterface;


class Data extends \Magento\Framework\App\Helper\AbstractHelper{

    public $_options = [];

    /**
     * @var SourceRepositoryInterface
     */
    private $sourceRepository;

    /**
     * @var SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;

    /**
     * Place constructor.
     *
     * @param SourceRepositoryInterface $sourceRepository
     * @param SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
     */
    public function __construct(
        SourceRepositoryInterface $sourceRepository,
        SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
    ) {
        $this->sourceRepository = $sourceRepository;
        $this->searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
    }

    /**
     * {@inheritdoc}
     * @codeCoverageIgnore
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            /** @var SearchCriteriaBuilder $searchCriteriaBuilder */
            $searchCriteriaBuilder = $this->searchCriteriaBuilderFactory->create();
            $searchCriteria = $searchCriteriaBuilder->create();
            $sources = $this->sourceRepository->getList($searchCriteria)->getItems();
            foreach ($sources as $source) {
                $this->_options[] = [
                    'value' => $source->getCountryId(),
                    'label' => $source->getCountryId()
                ];
            }
        }
        return $this->_options;
    }


}