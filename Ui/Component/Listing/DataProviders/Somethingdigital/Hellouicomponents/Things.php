<?php
namespace SomethingDigital\HelloUiComponents\Ui\Component\Listing\DataProviders\Somethingdigital\Hellouicomponents;

class Things extends \Magento\Ui\DataProvider\AbstractDataProvider
{    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \SomethingDigital\HelloUiComponents\Model\ResourceModel\Thing\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
