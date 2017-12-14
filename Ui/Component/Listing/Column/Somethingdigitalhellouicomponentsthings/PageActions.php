<?php
namespace SomethingDigital\HelloUiComponents\Ui\Component\Listing\Column\Somethingdigitalhellouicomponentsthings;

class PageActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            foreach ($dataSource["data"]["items"] as & $item) {
                $name = $this->getData("name");
                $id = "X";
                if(isset($item["somethingdigital_hellouicomponents_thing_id"]))
                {
                    $id = $item["somethingdigital_hellouicomponents_thing_id"];
                }
                $item[$name]["view"] = [
                    "href"=>$this->getContext()->getUrl(
                        "things/thing/edit",["somethingdigital_hellouicomponents_thing_id"=>$id]),
                    "label"=>__("Edit")
                ];
            }
        }

        return $dataSource;
    }    
    
}
