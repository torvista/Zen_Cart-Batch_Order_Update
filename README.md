# Zen Cart - Batch Order Update

This branch is for Zen Cart 1.5.8.

This mod is for the Admin, Order listing page. It is multi-language.

When an order status filter is selected:
1) A checkbox is added to each order to allow multiple selection multiple selection.
2) A dropdown is displayed to select the new status for the selected orders.
The orders can be updated in one action, emails can be optionally sent.

## How it works
The list of orders and their languages is stored in an array and updated one-by-one using redirects and the language parameter to send each email in the order language.
When complete, the admin language is reset to it's original language.

Clumsy, slow, inefficient...but until the whole order email process is reworked, it will have to do. But it works.

## Installation
As always with any 3rd party code, ASSUME THAT THIS WILL DESTROY YOUR SHOP, so take the necessary steps to prevent that...USE A DEVELOPMENT SERVER to test.

As always, do not blindly copy anything: compare and merge all files.

Modifications to the order listing to add the checkboxes are cleanly done by the observer.

order.php
Modifications are extensive and so need careful merging. A copy of the 158 file used as base is included to facilitate the comparison, since it is currently a moving target. You can delete it later, but it does no harm and is useful.

languages/english/order.php
Needs to be merged as there are modifications and extra constants.
 
### Changelog
Use GitHub to see what happened and when. Use a Github client to keep up to date. I use GitKraken.
