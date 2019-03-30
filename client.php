<?php 
class client
{
	public function __construct(){
		$params = array('location' => 'http://localhost/xml/server.php', 
	     'uri' => 'urn://localhost/xml/server.php',
	     'trace' => 1);
		$this->instance = new SoapClient(NULL,$params);
	}

	public function sendMsg($sid,$msg,$rid){
		$id1 = array('sid'=>$sid,'msg'=>$msg,'rid'=>$rid);
		return $this->instance->__soapCall('CallSer',$id1);
	}
}
?>