<?php
namespace SomethingDigital\HelloUiComponents\Controller\Adminhtml\Thing;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'SomethingDigital_HelloUiComponents::things_menu';  
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/index/index');
        return $resultRedirect;
    }     
}
