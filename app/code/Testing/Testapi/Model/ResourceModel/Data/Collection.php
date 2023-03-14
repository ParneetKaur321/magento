<?php
namespace Testing\Testapi\Model\ResourceModel\Data;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'testing_testapi_data_collection';
    protected $_eventObject = 'data_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Testing\Testapi\Model\Data', 'Testing\Testapi\Model\ResourceModel\Data');
    }
}
