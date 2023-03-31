<?php
namespace Test2\Task2\Observer;
use Magento\Framework\Event\ObserverInterface;
class PlaceOrder implements ObserverInterface
{   
    protected $_logger;
    protected $_storeManager;

    public function __construct    (
        \Psr\Log\LoggerInterface $logger,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) 
    { 
        $this->_storeManager = $storeManager;
        $this->_logger = $logger;    
    }

    // FUNCTION TO GET CURRENT TOKEN---------------------------
    
    public function getAuthToken(){

        // GET BASE URL----------------------------

        $store= $this->_storeManager->getStore()->getBaseUrl();

        $token_url = $store."rest/V1/integration/admin/token";
        $username = "admin";
        $password = "admin123";

        //Authentication rest API magento2, For get access token

        $ch = curl_init();
        $data = array("username" => $username, "password" => $password);
        $data_string = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $token_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $token = curl_exec($ch);
        $accessToken = json_decode($token);
        return $accessToken;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {   
        // FOR LOGGER FILE------------------------------

        // $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        // $logger = new \Zend_Log();
        // $logger->addWriter($writer);
        
        // GET BASE URL---------------------------

        $store= $this->_storeManager->getStore()->getBaseUrl();

        // DETECT DEVICE----------------------------
     
        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
        $orderId = $observer->getEvent()->getOrder()->getId();

        if($isMob){ 
            $devvice = "M";
        }
        else{
            $devvice = "D";
        }

        $arr['entity']['entity_id'] = $orderId;
        $arr['entity']['extension_attributes']['device']= $devvice;

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $store.'rest/V1/orders?entity_id='.$orderId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($arr),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$this->getAuthToken().'',
            'Content-Type: application/json',
            'Cookie: PHPSESSID=h1kv8eglhspvjotepdarr3ikf5; mage-messages=%5B%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid%20Form%20Key.%20Please%20refresh%20the%20page.%22%7D%5D; private_content_version=47e67ab95eb5ff6f5ae8654f041bcb4b'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

}