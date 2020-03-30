<?php

namespace SmartOSC\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use SmartOSC\Blog\Model\PostFactory;

class Save extends Action
{
    protected $postFactory;
    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context, PostFactory $postFactory)
    {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $post = $this->postFactory->create();
        $post->setData($data);
        if ($post->save()) {
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } else {
            $this->messageManager->addError(__('Row data has not saved'));
        }
        return $this->_redirect('smartblog/post/index');
    }
}
