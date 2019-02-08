<?php


namespace Vaimo\TestModule\Controller\Adminhtml\AccountManager;


class Edit extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contactDatas = $this->getRequest()->getParam('contact');
        if(is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Contact::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }

}