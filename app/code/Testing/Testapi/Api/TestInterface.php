<?php
namespace Testing\Testapi\Api;

interface TestInterface
{
    
    /**
     * Save for Post api
     * 
     * @api
     * @param \Testing\Testapi\Api\TestInterface $data
     * 
     * @return \Testing\Testapi\Api\TestInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
     public function saveData($data);
}
