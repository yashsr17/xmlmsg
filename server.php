<?php

class server
{
	public function Callser($sid,$msg,$rid){
		$xml = new DOMDocument("1.0","UTF-8");
		$xml -> load("database.xml");
		$rootTag = $xml->getElementsByTagName("document")->item(0);
		$dataTag = $xml->createElement("data");
		$a = $xml->createElement("Receiverid",$rid);
		$b = $xml->createElement("Message",$msg);
		$c = $xml->createElement("Senderid",$sid);
		$dataTag -> appendChild($a);
		$dataTag -> appendChild($b);
		$dataTag -> appendChild($c);
		$rootTag -> appendChild($dataTag);
		$xml->save("database.xml");

		return "Sent!!";
	}
}

$params = array('uri' => 'localhost/xml/server.php');
$server = new SoapServer(NULL, $params);
$server -> setClass('server');
$server -> handle();
?>