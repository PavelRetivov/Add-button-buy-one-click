# Button one click(button now)
## Description
Creates a button that is located near the main add to cart button on the product page, when pressed, asks to enter the phone number, and transfers data to the customer_quick_buy table that was created in the module. 
It also gives an opportunity to review all orders in the table located in the admin area. **Sales->Quick orders**.
### Setting
- Magento 2.4.7-p3
#### How to use
* Create project magento 2
* install sampledata:deploy  
* Open src/app/code
* Put the file from the code folder from the repository there (must be src/code/OneCLick/Order...).
* Do setup:upgrade

