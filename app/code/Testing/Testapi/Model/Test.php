<?php
namespace Testing\Testapi\Model;
// use Testing\Testapi\Api\TestInterface;
// use Psr\Log\LoggerInterface;
class Test
{ 
    // protected $logger;
 
    // public function __construct(
    //     LoggerInterface $logger,
    //     \Stackexchange\Test\Model\GridFactory $gridFactory
    // )
    // {
    //     $this->logger = $logger;
    //     $this->gridFactory = $gridFactory;
    // }
    
    /**
     * {@inheritdoc}
     */

    public function saveData($data)
    {   
        echo "hello world";
        exit();

        // $id =  $data['id'];
        // $name =$data['name'];
        // $number =$data['number'];
        // $city =$data['city'];
            
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        // $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        // $connection = $resource->getConnection();
        // $tableName = $resource->getTableName('tabletest_api');

        // $sql = "Insert Into " . $tableName . " (name, city) Values ('$name', '$city')";     
        // $connection->query($sql);       
        // return 'successfully saved';
       
    }
        
} 

