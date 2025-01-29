define([
    'jquery',
    'Magento_Catalog/js/catalog-add-to-cart',
    'mage/translate',
    'OneClick_Order/js/service/orders'
], function ($, originalCatalogAddToCart, $t, serviceOrders) {
    'use strict';

    const BUY_ON_CLICK= 'Buy One Click';
    const ADD_TO_CART = 'Add to Cart';
    let CLICK_BUTTON = '';


    $.widget('mage.catalogAddToCart', originalCatalogAddToCart, {


        /** @inheritdoc */
        _create: function () {

            this.options = $.extend(true, {}, this.options, {
                addToCartButtonSelector: '.action.tocart',
                addToBuyOneClickButtonSelector: '.action.tooneclick',
                clickedButton: '',
                promptText: '',
            });

            Object.defineProperty(this.options, 'promptText', {
                get: function() {
                    return this._promptText;
                },
                set: function(value) {
                    this._promptText = value;
                }
            });

            $(this.options.addToCartButtonSelector).on('click', function () {
                CLICK_BUTTON = ADD_TO_CART;
            });

            $(this.options.addToBuyOneClickButtonSelector).on('click', function () {
                CLICK_BUTTON = BUY_ON_CLICK;
            });

            if (this.options.bindSubmit) {
                this._bindSubmit();
            }

            $(this.options.addToCartButtonSelector).prop('disabled', false);
            $(this.options.addToBuyOneClickButtonSelector).prop('disabled', false);
        },

        /**
         * Handler for the form 'submit' event
         *
         * @param {jQuery} form
         */
        submitForm: function (form) {
            const product = form.data();
            let sku = product.productSku;

            if(!sku){
                sku = 'not fiend SKU';
            }

            if(CLICK_BUTTON === ADD_TO_CART){
                this.ajaxSubmit(form);
            }else if(CLICK_BUTTON === BUY_ON_CLICK){
               const phone = this.promptMessage(form);
               if(!phone){
                    return;
               }

              serviceOrders.create(sku, phone).then(
                    (result) => {
                            location.reload();
                    }
                ).catch((error) => {
                  console.error("error:", error);
              });
            }
        },
        promptMessage: function (form) {
            this.enableAddToCartButton(form);
           return  this.options.promptText = window.prompt('You number');
         },

        /**
         * @param {String} form
         */
        disableAddToCartButton: function (form) {
            var addToCartButtonTextWhileAdding = this.options.addToCartButtonTextWhileAdding || $t('Adding...'),
                addToCartButton = $(form).find(this.options.addToCartButtonSelector),
                addToBuyOneClickButtonSelector = $(form).find(this.options.addToBuyOneClickButtonSelector);

            addToCartButton.addClass(this.options.addToCartButtonDisabledClass);
            addToBuyOneClickButtonSelector.addClass(this.options.addToCartButtonDisabledClass);
            addToCartButton.find('span').text(addToCartButtonTextWhileAdding);
            addToCartButton.prop('title', addToCartButtonTextWhileAdding);
        },

        /**
         * @param {String} form
         */
        enableAddToCartButton: function (form) {
            var addToCartButtonTextAdded = this.options.addToCartButtonTextAdded || $t('Added'),
                self = this,
                addToCartButton = $(form).find(this.options.addToCartButtonSelector),
                addToBuyOneClickButtonSelector = $(form).find(this.options.addToBuyOneClickButtonSelector);

            addToCartButton.find('span').text(addToCartButtonTextAdded);
            addToCartButton.prop('title', addToCartButtonTextAdded);

            setTimeout(function () {
                var addToCartButtonTextDefault = self.options.addToCartButtonTextDefault || $t('Add to Cart');

                addToCartButton.removeClass(self.options.addToCartButtonDisabledClass);
                addToBuyOneClickButtonSelector.removeClass(self.options.addToCartButtonDisabledClass);
                addToCartButton.find('span').text(addToCartButtonTextDefault);
                addToCartButton.prop('title', addToCartButtonTextDefault);
            }, 1000);
        }
    });

    return $.mage.catalogAddToCart;
});
