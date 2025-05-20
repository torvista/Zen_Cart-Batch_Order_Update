# Zen Cart - Batch Order Update

https://github.com/torvista/Zen_Cart-Batch_Order_Update

https://www.zen-cart.com/showthread.php?228192-Batch-Order-Status-Update

## Function
This is an Admin plugin for the Orders page.
It allows you to select multiple orders (of the same status) and update them to a different status with one action.

## Compatibility
It is compatible from Zen Cart 1.58 to current (2.10) and php8.

## How it works
### User
On the Admin Orders page, when the orders are filtered by status:
1) A checkbox column is added to each order line to allow multiple selection of the orders.
2) A dropdown is displayed to select the new status for those selected orders.
The orders can be updated in one action, emails can be optionally sent.

### Technical
The list of orders and their languages is stored in an array and updated one-by-one using redirects and the language parameter to send each email in the order language.
When complete, the admin language is reset to it's previous language.

Clumsy, slow, inefficient...but until the whole order email process is reworked, it will have to do.  
But it works.

## Installation
As always with any 3rd party code, ASSUME THAT THIS WILL DESTROY YOUR SHOP AND EAT YOUR PETS, so take the necessary steps to prevent that...USE A DEVELOPMENT SERVER to test.

As always, do not blindly copy everything: COMPARE, and MERGE where there are file equivalences.

All files are new with the exception of admin/orders.php.  
Although a couple of observers are used where possible, multiple manual edits are necessary to the admin/orders.php file.  
This requires 10 modifications so needs merging with your version of the file, but all the mods are clearly marked, and a copy of the ZC 210 file used as the base is included to facilitate the comparison.  You can delete it later, but it does no harm and is a useful reference.

The language constants include two that override the core constants to include the order number in the messageStack confirmation message.

### Changelog
Use GitHub to see what happened and when.  
Fixes are applied when needed, so "watch" the respository for minor changes. 

09/05/2025: Reworked for ZC210.

