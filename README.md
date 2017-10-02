# Fix for New Relic Deployments

Magento 2 currently ships with a `Magento_NewRelicReporting` module.  This module implements advanced monitoring features for the [New Relic](https://newrelic.com/) suite of application monitoring products.  

This module also features a bug, where, once an hour, Magento systems will send New Relic a single deployment event for each installed module.  This bugs stems from an unfinished deployment integration in Magento and has no clear easy fix short of a complete reimplementation of this feature.

What this Module Does
--------------------------------------------------
This module offers a band aid that prevents the flooding of New Relic with invalid deployment events, and also offers Magento 2 users a way to create their own custom deployment events (based on their own deployment strategies).

First, this module uses a class preference for the `Magento\NewRelicReporting\Model\Cron\ReportNewRelicCron` class that cancels Magento's normal deployment marker routines.

Second, this module implements a new `php bin/magento newrelic:create:deploy-marker` command that allows users to create deployment events.  

How to Use this Module
--------------------------------------------------
You can use this module by adding the following entries to you `composer.json` file.

    {
        /* ... */
        "require": {
            /* ... */,
            "magento/module-new-relic-reporting-patch":"100.0.0"
        },

        "repositories": [
            /* ... */,
            {
                "type": "vcs",
                "url": "..."
            }
    }

Once added, run 

    $composer update
    
This will download the module to your `vendor` folder.  Once installed, run the following commands

    php bin/magento module:enable Newrelic_Patch
    php bin/magento setup:upgrade
    
Once you run the above commands, the module will be enabled and ready to use.  The module will automatically cancel the invalid deployment events, and you'll be able to create deployments using the following command syntax

    php bin/magento newrelic:create:deploy-marker "Deploy Message" "Here's the changelog"
    