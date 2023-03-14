<?php
namespace Practise\Testapi\Model;

use Psr\Log\LoggerInterface;
class Test 
{

    protected $logger;
 
    public function __construct(
        LoggerInterface $logger,
        \Practise\Testapi\Model\GridFactory $gridFactory
    )
    {
        $this->logger = $logger;
        $this->gridFactory = $gridFactory;
    }
     /**
     * {@inheritdoc}
     */
    public function storeData($data)
    {   
    $name = $data->getName();
        // echo "this ydcfj";
        
    
       
        $data = ['name' => $name];

        try {
            $rowData = $this->gridFactory->create();
            $rowData->setData($data);
            $rowData->save();

            $response = ['success' => true, 'message' => 'Row data has been successfully saved.'];

        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        
        $returnArray = json_encode($response);
        return $returnArray; 
        return 'successfully saved';
    }
}
