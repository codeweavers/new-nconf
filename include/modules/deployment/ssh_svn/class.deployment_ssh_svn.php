<?php
class ssh_svn extends NConf_Deployment_Modules
{
    function __construct(){
        $this->path = dirname(__FILE__);
    }
    public function command($host_infos){

        // execute rsync
		$command = "ssh " . $host_infos["ssh_options"] . " " . $host_infos["username"] . "@" . $host_infos["host"] . " 'svn update --username=". '"' . $host_infos["svnUsername"] . '"' . " --password=" . $host_infos["svnPassword"] . " --non-interactive " . $host_infos["path"] . "'";
        $status = $this->system_call($command, TRUE);
        
		return $status;
    }
}
?>
