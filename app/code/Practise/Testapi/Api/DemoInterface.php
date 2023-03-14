<?php
namespace Practise\Testapi\Api;

interface DemoInterface
{
    /**
     * Save for Post api
     *
     * @api
     * @param \Practise\Testapi\Api\Data\DataInterface $data
     *
     * @return \Practise\Testapi\Api\Data\DataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function storeData($data);

}
