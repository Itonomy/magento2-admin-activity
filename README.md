# Magento 2 - Admin Activity by [Itonomy](https://www.itonomy.nl) a continuation of the module by [KiwiCommerce](https://kiwicommerce.co.uk/)
- Easily track every admin activity like add, edit, delete, print, view, mass update etc.
- Failed attempts of admin login are recorded as well. You get access to the user’s login information and IP address.
- Track page visit history of admin.
- Track fields that have been changed from the backend.
- Allow administrators to revert the modification.

## **Installation**
1. Composer Installation
      - Navigate to your Magento root folder<br />
            `cd path_to_the_magento_root_directory`
      - Then run the following command<br />
          `composer require itonomy/module-admin-activity`
      - Make sure that composer finished the installation without errors.
   
- After installing the extension, run the following command
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```
- Log out from the backend and log in again.

## Where will it appear in the Admin Panel
### Admin Activity Log
Go to **System > Admin Activity > Admin Activity**. Here you can See the list of admin activity logs and page visit history.

<img src="https://kiwicommerce.co.uk/wp-content/uploads/2018/06/admin-activity-history.png"/><br/>

- Page Visit History

<img src="https://kiwicommerce.co.uk/wp-content/uploads/2018/06/page-visit-history.png"/><br/>

By clicking View in each admin activity log, you can see the slider with admin activity log details.

<img src="https://kiwicommerce.co.uk/wp-content/uploads/2018/05/activity-log-slider.png"/> <br/>

### Login Activity
Go to **System > Admin Activity > Login Activity**. Here you can See the list of login activity logs.

<img src="https://kiwicommerce.co.uk/wp-content/uploads/2018/06/admin-activity-history.png"/><br/>

## Configuration
You need to follow this path. **System > Admin Activity > Configuration**
- General configuration

<img src="https://kiwicommerce.co.uk/wp-content/uploads/2018/05/configuration-general-section.png" /> <br/>

- Allow Module Section

<img src="https://kiwicommerce.co.uk/wp-content/uploads/2018/05/configuration-allow-module-section.png" /> <br/>

## Need Additional Features?
Feel free to get make a feature request issue on [GitHub](https://github.com/itonomy/magento2-admin-activity/issues)

## Contribution
  - Creating bug reports, issues or feature requests on [Github](https://github.com/itonomy/magento2-admin-activity/issues)
  - Submitting pull requests for improvements.
