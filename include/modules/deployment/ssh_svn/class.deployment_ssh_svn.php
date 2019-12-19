<?php
class ssh_svn extends NConf_Deployment_Modules
{
    function __construct(){
        $this->path = dirname(__FILE__);
    }
    public function command($host_infos){
	    $command = "ssh " . $host_infos["ssh_options"] . " " . $host_infos["username"] . "@" . $host_infos["host"] . " 'sudo /usr/bin/svn update --username " . $host_infos["svnUsername"] . " --password " . $host_infos["svnPassword"] . " --non-interactive --no-auth-cache " . $host_infos["path"] . "'";
	    $status = $this->system_call($command, TRUE);
	    return $status;
    }
}
?>
