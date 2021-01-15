<?php

namespace Dtn\Office\Model\ResourceModel\Employee\Grid;

use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

/**
 * Collection for displaying grid of Department
 */
class Collection extends SearchResult
{
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable = 'office_employee_entity',
        $resourceModel = 'Dtn\Office\Model\ResourceModel\Employee',
        $identifierName = null, $connectionName = null
    )
    {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel, $identifierName, $connectionName);
    }

    public function _initSelect()
    {
        parent::_initSelect();
        return $this->getSelect()->join(
            ['secondTable' => $this->getTable('office_department')],
            'main_table.department_id= secondTable.entity_id'
        );
    }
}
