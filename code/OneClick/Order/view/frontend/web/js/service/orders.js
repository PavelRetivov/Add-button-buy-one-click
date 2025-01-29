define(['mage/storage'], function (storage) {
    'use strict';

    return {
        create: async function (sku, phone) {
            const url = 'rest/V1/customer/order/setItem/create';
            return await storage.post(
                url,
                JSON.stringify({
                    sku: sku,
                    phone: phone
                })
                );
        }
    }
});
