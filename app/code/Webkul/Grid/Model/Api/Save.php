<?php
 
namespace Webkul\Grid\Model\Api;
 
use Psr\Log\LoggerInterface;
 
class Save
{
    protected $logger;
 
    public function __construct(
        LoggerInterface $logger,
        \Webkul\Grid\Model\GridFactory $gridFactory
    )
    {
        $this->logger = $logger;
        $this->gridFactory = $gridFactory;
    }
    
 
    /**
     * @inheritdoc
     */
 
    public function savePost($post)
    {
        $title = $post->getTitle();
        $content = $post->getContent();
        $publishDate = $post->getPublishDate();
        $isActive = $post->getIsActive();

        $data = ['title' => $title, 'content' => $content , 'publish_date' => $publishDate, 'is_active' => $isActive ];

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
    }

}