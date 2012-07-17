<?php 
    class PhoneList {
		public $results;
		private $client;
		function __construct() {
			$this->client = new SoapClient('http://phonelist/gateway/RGAPeopleGateWay.asmx?WSDL', array('trace' => true,  'exceptions' => true,'connection_timeout'=>9999,'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'soap_version' => SOAP_1_1, 'encoding' => 'ISO-8859-1'));
			
		}
		function makeCall($wsdl, $options){
			$this->results = $this->client->$wsdl ($options); 
		}
		
	}
?>