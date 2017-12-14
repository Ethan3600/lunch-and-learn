<?php
namespace SomethingDigital\HelloUiComponents\Model;
class Thing extends \Magento\Framework\Model\AbstractModel implements \SomethingDigital\HelloUiComponents\Api\Data\ThingInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'somethingdigital_hellouicomponents_thing';

    protected function _construct()
    {
        $this->_init('SomethingDigital\HelloUiComponents\Model\ResourceModel\Thing');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
