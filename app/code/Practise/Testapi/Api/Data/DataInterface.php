<?php
namespace Practise\Testapi\Api\Data;

interface DataInterface
{
    const NAME = 'name';
    
    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName();


    /**
     * Set Name
     *
     */
    public function setName($name);

}
