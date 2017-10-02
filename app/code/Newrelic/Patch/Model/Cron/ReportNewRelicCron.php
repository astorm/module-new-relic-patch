<?php
namespace Newrelic\Patch\Model\Cron;
use Magento\NewRelicReporting\Model\Cron\ReportNewRelicCron as ParentReportNewRelicCron;
class ReportNewRelicCron extends ParentReportNewRelicCron
{
    /**
     * Using a class prefernce to cancel the module deployment
     * reporting, which is broken with no obvious/easy fix 
     * short of reimplementation.
     */
    protected function reportModules()
    {
        return $this;
    }
}
