<?php
namespace SomethingDigital\HelloUiComponents\Model\ResourceModel;
class Thing extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('somethingdigital_hellouicomponents_thing','somethingdigital_hellouicomponents_thing_id');
    }
}
