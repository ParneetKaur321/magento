<?php
namespace Testing\Testapi\Model;
use Testing\Testapi\Api\Data\DataInterface;
class Data extends \Magento\Framework\Model\AbstractModel implements DataInterface
{
    const CACHE_TAG = 'tabletest_api';

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
    protected $_eventPrefix = 'tabletest_api';
 
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Testing\Testapi\Model\ResourceModel\Data');
    }

    /**
     * Get Name
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
