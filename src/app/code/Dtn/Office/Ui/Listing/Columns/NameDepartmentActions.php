<?php

namespace Dtn\Office\Ui\Listing\Columns;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class TestActions
 */
class NameDepartmentActions extends Column
{
    /**
     * @var \Dtn\Office\Model\ResourceModel\Department\CollectionFactory
     */
    protected $departmentFactory;
    protected $employeeFactory;
    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Dtn\Office\Model\ResourceModel\Department\CollectionFactory $departmentFactory,
        \Dtn\Office\Model\ResourceModel\Employee\CollectionFactory $employeeFactory,
        array $components = [],
        array $data = []
    ) {
        $this->departmentFactory= $departmentFactory;
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['department_id'])) {


                    if($this->getData('name') == "entity_id"){
                        $user = $this->departmentFactory->create()->load($item['entity_id']);
                        $item[$this->getData('name')]=[$user->getName()];

                    }
                }
            }
        }

        return $dataSource;
    }
}
