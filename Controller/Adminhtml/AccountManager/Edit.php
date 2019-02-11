<?php


namespace Vaimo\TestModule\Controller\Adminhtml\AccountManager;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;

//        $this->_view->loadLayout();
//        $this->_view->renderLayout();



//        $contactDatas = $this->getRequest()->getParam('contact');
//        if(is_array($contactDatas)) {
//            $contact = $this->_objectManager->create(Contact::class);
//            $contact->setData($contactDatas)->save();
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/index');
//        }

    }

}