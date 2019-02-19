# Vaimo/TestModule description

This module assigns an account manager to an order depending on its postal code. The account manager names and postal code are loaded from a csv file during the installation of the module.Also two custom columns with the same name (account_manager) were added to the tables sales_order and sales_order grid. 

When an order is placed, the modules listens to the event called “checkout_submit_all_after” and it calls the Observer class “SaveAccountManager”. This class checks if the postal code introduce during checkout belongs to any of the account managers that are listed in the csv file, thenit saves the account manager to the sales_order table. If the postal code does not belong to any of the account managers, it will return an empty string. 

The name of the account manager is displayed in the backend of the store, inside the sales grid in the tab named Account Manager. It is also possible to see the list of the account managers and postal code from the tab Account Manager and select Account Managers option. 

At the moment it is not possible to add or edit the Account Managers list since it was not part of the initial requirements. Also it is not possible to edit the amount each account manager can take to accept an order since I was not able to add the edit form in the admin grid.
