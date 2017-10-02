<?php
namespace Newrelic\Patch\Model;

class ServiceShellUser
{
    const DEFAULT_USER='cron';
    public function get($userFromArgument=false)
    {
        if($userFromArgument)
        {
            return $userFromArgument;
        }
        
        $user = `echo \$USER`;
        if($user)
        {
            return $user;
        }
        
        return self::DEFAULT_USER;
    }
}
