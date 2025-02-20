---
title: Payone ACP app
description: With Payone, your customers can pay with common payment methods, such as credit card, PayPal, Prepayment and Klarna.
template: howto-guide-template
last_updated: Aug 30, 2024
redirect_from:
   - /docs/aop/user/apps/payone.html
   - /docs/acp/user/apps/payone.html
   - /docs/pbc/all/payment-service-providers/payone/payone.html
   - /docs/pbc/all/payment-service-provider/202311.0/third-party-integrations/payone/integration-in-the-back-office/payone-integration-in-the-back-office.html
   - /docs/pbc/all/payment-service-provider/202404.0/base-shop/third-party-integrations/payone/integration-in-the-back-office/payone-integration-in-the-back-office.html
---

[Payone](https://www.payone.com/DE-en?ref=spryker-documentation) lets your customers make payments with common payment methods, such as credit card, PayPal, Prepayment, and Klarna.

The Payone integration in Spryker is part of the App Composition Platform and supports both the default Storefront Yves and Spryker GLUE APIs.

You can have multiple accounts with Payone. For example, you can have different Payone credentials per store.

## Supported business models and payment methods

The Payone App supports the B2B and B2C business models and the following payment methods:

* Credit Card
* Paypal Standard
* Klarna:
  * Invoice: pay later
  * Installments: slice it
  * Direct Debit: pay now
* Prepayment

## Payment methods explained

For the *Payone Credit Card* payment method, the following modes are supported:

- *Preauthorization and Capture*: After a customer entered the credit card details during the checkout, the seller preauthorizes or reserves the payable amount on the customer's credit card. As soon as the items have shipped, this amount is captured. Capture kicks off the process of moving money from the customer's credit card to the seller's account. The preauthorization and capture mode is the best choice for physical goods. It ensures that in case the ordered items are not available anymore or the customer cancels the order before it's shipped, the seller does not have to transfer the money back to the customer's account and thereby avoids a chargeback.
- *3DS*: Messaging protocol that enables consumer authentication with their card issuer when making online purchases.
- *PCI DSS Compliance via SAQ A*: A set of security standards designed to ensure that you accept, process, and transmit credit card information in a secure environment.

For the *Payone Paypal* payment method, we support only *Preauthorization and Capture*.

{% info_block infoBox "State machine for Payone" %}

The payment modes like Preauthorization and Capture must be set via the Spryker state machine in the Order Management System (OMS). However, the state machine for the Payone app is now in development, so you can not customize it for your project yet.

{% endinfo_block %}

## Credit card payment flow

When customers pay with a credit card (with optional support of 3DS), the flow is as follows:

1. Customer provides their credit card payment credentials and pays the required amount for the placed order.
2. The customer's credit card data is validated.
3. Customer receives a payment message, whether the payment or authorization was successful.

When paying with a credit card, customers can do the following:

- Repeat payments as often as they want if the payment (preauthorization) has failed, or cancel and close the payment page.
- Cancel the entire order before shipment and receive the money back, that is, void the existing preauthorization without being charged a fee.
- Cancel the order after it's ready for shipment and receive the money back, that is, trigger a refund.
- Return the order or its items after it has been successfully shipped and is refunded for the returned items or the entire order.

When customers pay with a credit card, a shop owner can do the following:


- Charge customers once the order is ready to be shipped, that is, capture the funds.
- Cancel the entire customer order, that is, void the existing preauthorization. In this case, the customer is not charged anything.
- Cancel one or more items of a customer's order before shipment. The customer is not charged for the canceled items.

## PayPal payment flow

When customers pay with PayPal, the flow is as follows:

1. Customer is redirected to the PayPal website, where they have to log in.
2. On the PayPal website, the customer either cancels or validates the transaction.
3. Customer is taken to the checkout page with the message of either a successfully placed or canceled order.

When paying with PayPal, customers can:

- Cancel the entire order before shipment and receive the money back, that is, void the existing preauthorization, without being charged a fee.
- Cancel the order after it's ready for shipment and receive the money back, that is, trigger a refund.
- Return the order or its items after it has been successfully shipped and is refunded for the returned items or the entire order.

When customers pay with PayPal, a shop owner can do the following:

- Charge customers once the order is ready to be shipped, that is, capture the funds.
- Cancel the entire customer order, that is, void the existing preauthorization. In this case, the customer is not charged anything.
- Cancel one or more items of a customer's order before shipment. The customer is not charged for the canceled items.

## Current limitations

- Payments can be properly canceled only from the the Back Office and not from the Payone PMI.
- Payments can't be partially canceled. One payment intent is created per order and it can either be authorized or fully cancelled.
- When an item is canceled on the order details page, all order items are canceled.

## Next steps

[Integrate Payone](/docs/pbc/all/payment-service-provider/{{page.version}}/base-shop/third-party-integrations/payone/app-composition-platform-integration/integrate-payone.html)
