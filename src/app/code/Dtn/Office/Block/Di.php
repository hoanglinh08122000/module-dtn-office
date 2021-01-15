<?php

namespace Dtn\Office\Block;

class Di extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \
     * Dtn\Office\Model\ResourceModel\Department\CollectionFactory
     */
    protected $_departmentFactory;
    protected $a;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dtn\Office\Model\ResourceModel\Department\CollectionFactory $departmentFactory
    )
    {
        $this->_departmentFactory = $departmentFactory;
        parent::__construct($context);
    }

    /**
     * get data table derpartment
     *
     * @return \Dtn\Office\Model\ResourceModel\Department\Collection
     */
    public function getDi()
    {

        $a = "abkjshd";

        return $a;

    }

}
