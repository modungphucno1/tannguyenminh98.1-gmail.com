<?php

namespace SmartOSC\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use SmartOSC\Blog\Model\Post;

class NewAction extends Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contactDatas = $this->getRequest()->getParam('post');
        if (is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Post::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}
