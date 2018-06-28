<?php
/*
* DotDev - PHP Developer Test
* Author: Rhys Jenkin
* Date Completed: 28-06-2018
* Time taken: 3h 34m
* Remarks:
* // Errors
* 1. Bugfix: Add missing square break to $order_items data to separate items into individual arrays
* 2. Bugfix: If statements under formatData() need double equal signs operators
* 3. bugfix: add $this to data objects to make then accessable outside of the loadData() function 
*
* // Notes
* 1. Implemented the JsonSerializable interface just for something different.
* 2. Not 100% sure of the task "Update $run to determine if the program is run via the CLI or browser". I haven't updated '$run' but have determined if the script is running in CLI to get the option variable.
*
*/
class StoreData  implements JsonSerializable{

    //Store Data
    private $customers;
    private $orders;
    private $order_items;

    //Sortable Indexes
    private $date_index = [];
    private $totals_index = [];

    var $formatted_data = [];

    function __construct() 
    {
        $this->loadData();
    }

    public function loadData () 
    {
        $this->customers = (object) [
            ['id' => 'BQYLCQ0CCwIOBgYNBAcACw', 'name' => 'Bob'],
            ['id' => 'CQwPDAkDDAQLBQsOBAcMBw', 'name' => 'Jan'],
            ['id' => 'AgsIBAsFAwYCCw8GBAINAQ', 'name' => 'Steve'],
            ['id' => 'DAEFDQwPDwMCCwULBAAMDg', 'name' => 'Fred'],
            ['id' => 'DQkCAAYHAAMJBA4LBAUOCg', 'name' => 'Robot']
        ];
        $this->orders = (object) [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506476504],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506480104],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'customerId' => 'CQwPDAkDDAQLBQsOBAcMBw', 'dateOrdered' => 1506562904],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'customerId' => 'CgUDCQ8IDAsIBwUBBAgIAA', 'dateOrdered' => 1507081304],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'customerId' => 'AgsIBAsFAwYCCw8GBAINAQ', 'dateOrdered' => 1509068504],
            ['id' => 'CQALBwoDAw0AAQgHBAEJBQ', 'customerId' => 'DAEFDQwPDwMCCwULBAAMDg', 'dateOrdered' => 1538012504]
        ];
        $this->order_items = (object) [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']               ]
            ],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 90.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 3.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,  'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 15.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 32.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ]
        ];
    }

    // Collate the data provided in loadData() into the a formatted_data array with the format requested in the assesment
    private function collateOrderData()
    {
        foreach($this->orders as $order)
        {        
            $o = []; //order
            $i = $this->getOrderItemsData($order['id']); //items
            $c = $this->getOrderCustomerData($order['customerId']); //customer

            
            $o['date'] = $this->dates_index[$order['id']] = $order['dateOrdered'];
            $o['total'] = $this->totals_index[$order['id']] = $this->calcOrderItemsTotal($i);
            $o['customer'] = $c;
            $o['order_items'] = $i;

            $this->formatted_data[$order['id']] = $o;

            unset($o, $i, $c); // Oh, I See! ;)
        }
    }

    // Find and return the items belonging to a specific order id. return an empty array if none found
    private function getOrderItemsData($orderId)
    {    
        foreach ($this->order_items as $items)
        {
            if($items['id'] == $orderId)
            {
                $result = $items;
                break;
            }
        }

        if(!isset($result) || !isset($result['items']) || empty($result['items']))
        {
            return [];
            exit;
        }

        return $result['items'];
    }

    // Find and return the customer belonging to a specific customer id. return an empty array if none found
    private function getOrderCustomerData($customerId)
    {    
        foreach ($this->customers as $customer)
        {
            if($customer['id'] == $customerId)
            {
                $result = $customer;
                break;
            }
        }

        if(empty($result)){
            return [];
            exit;
        }

        return $result;

    }

    // Calculate the total value of the order by adding the item values together
    private function calcOrderItemsTotal($items)
    {
        if(empty($items)){
            return 0;
            exit;
        }

        $total = 0;
    
        foreach($items as $item){
            $total += $item['value'];
        }

        return $total;

    }

    // Sort by total value highest to lowest using array_multisort function
    private function sortOrdersByTotalValue()
    {
        array_multisort($this->totals_index, SORT_DESC, $this->formatted_data);
    } 

    // Sort by date value newest to oldest using array_multisort function
    private function sortOrdersByDate()
    {
        array_multisort($this->dates_index, SORT_DESC, $this->formatted_data);
    } 

    // Remove items from formatted_data variable that have no items
    private function filterOrdersByNoItems()
    {
        $this->formatted_data = array_filter($this->formatted_data, function($o) {
            return empty($o['order_items']);
        });
    } 

    // Update the function formatData to complete the data formatting task.
    public function formatData ($option)
    {
        // All data should be returned as formatted JSON.
        if ($option == 1) {
          // return orders sorted by highest value. Be sure to include the order total in the response
          $this->collateOrderData();
          $this->sortOrdersByTotalValue();
          
        } elseif ($option == 2) {
            // return orders sorted by date
            $this->collateOrderData();
            $this->sortOrdersByDate();
            
        } elseif ($option == 3) {
            // return orders without items
            $this->collateOrderData();
            $this->filterOrdersByNoItems();            
        }

        return $this->formatted_data;
    }

    public function jsonSerialize()
    {
        $response = (object) ['orders' => $this->formatted_data];
        return $response;
    }
}

// Update $run to determine if the program is run via the CLI or browser
// Is script running via Command Line?
if(PHP_SAPI === 'cli' && isset($argv[1]) && !empty((int)$argv[1])){ 
    $option = (int)$argv[1];
}
// Or get options value form URL
else if(isset($_GET['option']) && !empty((int)$_GET['option'])){
    $option = (int)$_GET['option'];
}

header('Content-Type: application/json');

if(!isset($option)){
    echo json_encode(['error' => 'No options variable set']);
    exit;
}


$run = new StoreData();
$run->formatData($option);

echo json_encode($run);