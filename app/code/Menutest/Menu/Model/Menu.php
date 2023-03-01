<?php
namespace Mageplaza\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'test_Menu';

	protected $_cacheTag = 'test_Menu';

	protected $_eventPrefix = 'test_Menu';

	protected function _construct()
	{
		$this->_init('Menutest\Menu\Model\ResourceModel\Menu');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}