<?php
namespace Newrelic\Patch\Model;

use Magento\NewRelicReporting\Model\Apm\DeploymentsFactory;

class ServiceDeploy
{
    protected $deploymentsFactory;
    
    public function __construct(
        DeploymentsFactory $deploymentsFactory
    )
    {
        $this->deploymentsFactory = $deploymentsFactory;
    }
    
    public function create($message, $changelog, $user, $data=[])
    {
        $this->deploymentsFactory->create()->setDeployment(
            $message, $changelog, $user
        );
    }
}