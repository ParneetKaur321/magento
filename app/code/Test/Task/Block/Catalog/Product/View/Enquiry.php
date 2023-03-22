<?php
namespace Test\Task\Block\Catalog\Product\View;
class Enquiry extends \Magento\Framework\View\Element\Template                                                                                                                                                                                                                                                                
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * 
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getMessage(){
      
        $pdf = new \Zend_Pdf();
        $pdf->pages[] = $pdf->newPage(\Zend_Pdf_Page::SIZE_A4);
        $page = $pdf->pages[0]; // this will get reference to the first page.
        $style = new \Zend_Pdf_Style();
        $style->setLineColor(new \Zend_Pdf_Color_Rgb(0,0,0));
        $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_TIMES);
        $style->setFont($font,15);
        $page->setStyle($style);
        $width = $page->getWidth();
        $hight = $page->getHeight();
        $x = 30;
        $pageTopalign = 850; //default PDF page height
        $this->y = 850 - 100; //print table row from page top – 100px

        // INFO AT THE TOP RIGHT OF THE PDF--------------------------------------

        $style->setFont($font,15);
        $page->setStyle($style);
        $page->drawText(__("1800 677 344"), $x + 430, $this->y+50, 'UTF-8');
        $style->setFont($font,11);
        $page->setStyle($style);
        $page->drawText(__("Magento_Test@gmail.com"), $x + 400, $this->y+33, 'UTF-8');
        $page->drawText(__("www.magento_test.com.au"), $x + 410, $this->y+16, 'UTF-8');
        $style->setFont($font,12);
        $page->setStyle($style);


        // GET CURRENT PRODUCT DETAILS----------------------------------------
       
        $myBlock = \Magento\Framework\App\ObjectManager::getInstance()->get('Test\Task\Block\HelloWorld');
        if ($currentProduct = $myBlock->getCurrentProduct()) {
            $product_id= $currentProduct->getId();
            $name= $currentProduct->getName();
            $sku= $currentProduct->getSku();
            $price= $currentProduct->getPrice();
            $fp= $currentProduct->getFinalPrice();
            $image= $currentProduct->getImage();
            

            // LOGO------------------------------------------------------

            $imageFile ='/var/www/html/magento/app/code/Test/Task/view/frontend/web/images/logo.png';
            $pathImage = \Zend_Pdf_Image::imageWithPath($imageFile);
            $page->drawImage($pathImage, 25, 750, 300, 825);

            // PRODUCT IMAGE------------------------------------------------
           
            $imageFile ='/var/www/html/magento/pub/media/catalog/product'.$image;
            $imagepath = \Zend_Pdf_Image::imageWithPath($imageFile);
            $page->drawImage($imagepath, 25, 500, 350, 700);


            // PRODUCT DETAILS-------------------------------------

            $page->drawText(__("PRODUCT NAME :-  ".$name), $x + 390, $this->y-100, 'UTF-8');
            $page->drawText(__("PRICE :-  ".$price), $x + 390, $this->y-120, 'UTF-8');
            $page->drawText(__("SKU :-  ".$sku), $x + 390, $this->y-140, 'UTF-8');
            $page->drawText(__("TOTAL :-  ".$fp), $x + 390, $this->y-160, 'UTF-8');
            $style->setFont($font,10);
            $page->setStyle($style);
            $style->setFont($font,10);
            $page->setStyle($style);
            $page->drawText(__("Magento Test "), ($page->getWidth()/2)-50, $this->y-600);
            
            // PDF -----------------------------------------------

            $pdfData = $pdf->render(); // Get PDF document as a string 
            // header("DirectoryList::MEDIA");
            header("Content-Disposition: inline; filename=product.pdf; DirectoryList::MEDIA"); 
            header("Content-type: application/x-pdf"); 
            echo $pdfData; 
            
        }
    }
}