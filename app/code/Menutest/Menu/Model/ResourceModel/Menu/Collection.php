<?php
namespace Menutest\Menu\Model\ResourceModel\Menu;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'menutest_menu_menu_collection';
    protected $_eventObject = 'menu_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Menutest\Menu\Model\Menu', 'Menutest\Menu\Model\ResourceModel\Menu');
    }
}
