
var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/model/shipping-save-process/default': {
                'Dtn_Checkout/js/model/set-save-process/default' : true
            }
        }
    },
    "map": {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default" : "Dtn_Checkout/js/model/shipping-save-processor/default"
        }
    }
};

