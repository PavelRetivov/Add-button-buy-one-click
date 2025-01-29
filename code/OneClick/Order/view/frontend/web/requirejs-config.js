var config = {
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'OneClick_Order/js/main/catalog-add-to-cart': true
            }
        }
    },
    map: {
        '*': {
            'css': 'Magento_Theme/css'
        }
    },
    paths: {
        'OneClick_Order/css': 'OneClick_Order/css/source/_module'
    }
};
