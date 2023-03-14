<?php
namespace Practise\Testapi\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'practise_testapi_grid_collection';
    protected $_eventObject = 'grid_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Practise\Testapi\Model\Grid', 'Practise\Testapi\Model\ResourceModel\Grid');
    }
}
