<?php
namespace Testing\Testapi\Api\Data;

interface DataInterface
{
    const NAME = 'name';
     
    /**
    * Get getName.
    *
    * @return mixed
    */
    
    public function getName();
        
    /**
    * Set EntityId.
    */
    public function setName($name);

}
