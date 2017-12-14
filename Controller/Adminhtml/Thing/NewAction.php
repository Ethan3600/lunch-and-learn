<?php
namespace SomethingDigital\HelloUiComponents\Controller\Adminhtml\Thing;

class NewAction extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'SomethingDigital_HelloUiComponents::things_menu';       
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;        
        parent::__construct($context);
    }
    
    public function execute()
    {
        return $this->resultPageFactory->create();  
    }    
}
