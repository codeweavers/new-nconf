<?php
class ssh_svn extends NConf_Deployment_Modules
{
    function __construct(){
        $this->path = dirname(__FILE__);
    }
    public function command($host_infos){
		$status = array();
		foreach($host_infos["host"] as $host){
			$command = "ssh " . $host["ssh_options"] . " " . $host["username"] . "@" . $host["host"] . " 'sudo /usr/bin/svn update --username " . $host["svnUsername"] . " --password " . $host["svnPassword"] . " --non-interactive --no-auth-cache " . $host["path"] . "'";
			$status[] = $this->system_call($command, TRUE);
		}
		return $status;
    }
}
?>
