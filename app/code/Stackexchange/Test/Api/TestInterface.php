<?php
namespace Stackexchange\Test\Api;

interface TestInterface
{

     /**
     * Save for Post api
     *
     * @api
     * @param \Stackexchange\Test\Api\Data\DataInterface $data
     *
     * @return \Stackexchange\Test\Api\Data\DataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

  public function set($data);

}