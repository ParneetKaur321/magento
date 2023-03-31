<?php
namespace Stackexchange\Test\Model;

use Stackexchange\Test\Api\Data\DataInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements DataInterface
{
    const CACHE_TAG = 'test_table';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'test_table';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Stackexchange\Test\Model\ResourceModel\Grid');
    }
  
    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
}
