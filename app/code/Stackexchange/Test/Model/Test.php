<?php
namespace Stackexchange\Test\Model;
use Stackexchange\Test\Api\TestInterface;
class Test implements TestInterface
{


     /**
     * {@inheritdoc}
     */
    public function setData($data)
    {   
        $id =  $data['id'];
        $name =$data['name'];
        $number =$data['number'];
        $city =$data['city'];
        //Customize the code as per your requirement.

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('test_table');

        $sql = "Insert Into " . $tableName . " (id, name, number, city) Values ('$id','$name','$number','$city')";     
        $connection->query($sql);       
        return 'successfully saved';
    }
}