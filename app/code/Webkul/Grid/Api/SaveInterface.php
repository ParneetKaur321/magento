<?php
namespace Webkul\Grid\Api;
 
interface SaveInterface
{
    /**
     * Save for Post api
     *
     * @api
     * @param \Webkul\Grid\Api\Data\GridInterface $post
     *
     * @return \Webkul\Grid\Api\Data\GridInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function savePost($post);
}


