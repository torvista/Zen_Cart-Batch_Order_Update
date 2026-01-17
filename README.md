# Zen Cart - Batch Order Update

https://github.com/torvista/Zen_Cart-Batch_Order_Update

https://www.zen-cart.com/showthread.php?228192-Batch-Order-Status-Update

## What does it do?
This is an Admin plugin for the Orders page.
It allows you to select multiple orders (of the same status) and update them to a different status with one action, and optionally send update emails in the order language.

## Compatibility
It is compatible from Zen Cart 1.58 to current (2.1.0/2.2.0 dev) and php8.

## How it works

### Admin Orders page
On the Admin Orders page, when the orders are filtered by status:
1) A checkbox column is added to each order line to allow multiple selection of the orders.
2) A dropdown is displayed to select the new status for those selected orders.
The orders can be updated in one action, emails can be optionally sent. Emails are sent in the order language.

### Technical
The list of orders and their languages is stored in an array and updated one-by-one using redirects and the language parameter to send each email in the order language.
When complete, the admin language is reset to it's previous language.

Inelegant, slow, inefficient...all of that, but it works. Until the whole order email process is reworked, it will have to do.  


## Installation
As always with any 3rd party code, ASSUME THAT THIS WILL DESTROY YOUR SHOP AND EAT YOUR PETS, so take the necessary steps to prevent that...USE A DEVELOPMENT SERVER to test.

As always, do not blindly copy everything: COMPARE, LOOK, THINK, UNDERSTAND and MERGE where there are file equivalences.

All files are new with the exception of admin/orders.php, so will not overwrite anything.

The language constants include two that override the core constants to be able to include the order number in the messageStack confirmation messages.

Although a couple of observers are used where possible, multiple manual edits are necessary to the admin/orders.php file.

orders.php is a complex file and has 10 code chunks inserted for the Batch mod so needs merging with your version of the file, but all the mods are clearly marked.

Since your orders.php is most likely to have your own mods, I have renamed this file so you cannot blindly overwrite yours.

I assume the names are self-explanatory, but my assumptions are often challenged.

"orders.210 with Batch php": current ZC 210 orders.php with the Batch code added.
"orders.210 ZC for comparison php": current ZC 210 orders.php to allow comparison with the above.

"orders.220 with Batch php": ZC development 220 orders.php with the Batch code added.
"orders.220 ZC for comparison php": development ZC 220 orders.php to allow comparison with the above.

You should compare the vanilla file with yours, which should highlight **your** mods, which are of course all clearly marked/documented in your code...  
Then compare the Batch version to yours, merging where it is clear there is no conflict, thinking about it where there is a conflict.

### Changelog
Use GitHub to see what happened and when.  
Fixes are applied when needed, so "watch" the respository for minor changes. 

17/01/2026: Updated readme and file dates, added ZC 220 file for reference

09/05/2025: Reworked for ZC210.

