<?php
namespace SomethingDigital\HelloUiComponents\Controller\Adminhtml\Thing;

use Magento\Backend\App\Action;
use SomethingDigital\HelloUiComponents\Model\Page;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
            
class Save extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'SomethingDigital_HelloUiComponents::things_menu';

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = SomethingDigital\HelloUiComponents\Model\Thing::STATUS_ENABLED;
            }
            if (empty($data['somethingdigital_hellouicomponents_thing_id'])) {
                $data['somethingdigital_hellouicomponents_thing_id'] = null;
            }

            /** @var SomethingDigital\HelloUiComponents\Model\Thing $model */
            $model = $this->_objectManager->create('SomethingDigital\HelloUiComponents\Model\Thing');

            $id = $this->getRequest()->getParam('somethingdigital_hellouicomponents_thing_id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the thing.'));
                $this->dataPersistor->clear('somethingdigital_hellouicomponents_thing');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['somethingdigital_hellouicomponents_thing_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->dataPersistor->set('somethingdigital_hellouicomponents_thing', $data);
            return $resultRedirect->setPath('*/*/edit', ['somethingdigital_hellouicomponents_thing_id' => $this->getRequest()->getParam('somethingdigital_hellouicomponents_thing_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }    
}
