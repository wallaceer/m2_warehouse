# Order warehouse for Magento 2

##Description
This module help you to manage warehouse for order in Magento 2.

In Magento 2 there is the inventory management function. Whit this function you can manage a different inventory and a different warehouse for products.
For every warehouse it's possible to insert some datas, for ex. Description, address, contact, ecc.

In some case, is useful to manage warehouse for order, instead for product and this module allows it.
When the store's user edit the order, it can set the warehouse.
The value of the warehouse is present in order's detail, in order grid and in csv orders export.

You can set the warehouse only for orders in work in progress.
If the order is closed or refunded, or canceled isn't possible to set the warehouse.

##Setup
You can install this module via Composer or manual setup.
To install it with composer you can insert this rows in your magento's composer.json

"require": {
	"ws/warehouse": "1.0.*"
    },

"repositories": {
	"m2_warehouse":{
            "type": "git",
            "url": "git@github.com:wallaceer/m2_warehouse.git"
        }
    }
    
After edited composer.json 
- launch composer update
- verify the module status with bin/magento module:status | grep Ws_Warehouse
- enable the module, if necessary, with bin/magento module:enable Ws_Warehouse
- run bin/magento setup:upgrade
    
For a manual installation, you can copy the module in your magento app/code.

In always case, after, remember to launch bin/magento setup:upgrade    