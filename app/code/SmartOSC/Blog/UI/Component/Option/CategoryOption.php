<?php

namespace SmartOSC\Blog\UI\Component\Option;

class CategoryOption implements \Magento\Framework\Data\OptionSourceInterface
{

    /**
     * @var \SmartOSC\Blog\Model\ResourceModel\Category\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var array|null
     */
    protected $_options;

    /**
     * Option constructor.
     * @param \SmartOSC\Blog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
     */
    public function __construct(
        \SmartOSC\Blog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->_options === null) {
            $collection = $this->_collectionFactory->create();

            $this->_options = [['label' => '', 'value' => '']];

            foreach ($collection as $category) {
                $this->_options[] = [
                    'label' => __('%1 Category', $category->getName()),
                    'value' => $category->getId()
                ];
            }
        }

        return $this->_options;
    }
}
