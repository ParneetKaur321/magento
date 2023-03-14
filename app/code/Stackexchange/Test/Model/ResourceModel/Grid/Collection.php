<?php
namespace Stackexchange\Test\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'stackexchange_test_grid_collection';
    protected $_eventObject = 'grid_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Stackexchange\Test\Model\Grid', 'Stackexchange\Test\Model\ResourceModel\Grid');
    }
}
