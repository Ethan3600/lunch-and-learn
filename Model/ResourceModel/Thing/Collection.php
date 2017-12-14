<?php
namespace SomethingDigital\HelloUiComponents\Model\ResourceModel\Thing;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('SomethingDigital\HelloUiComponents\Model\Thing','SomethingDigital\HelloUiComponents\Model\ResourceModel\Thing');
    }
}
