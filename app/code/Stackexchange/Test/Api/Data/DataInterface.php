<?php
namespace Stackexchange\Test\Api\Data;

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


