<?php
require_once("AfricasTalkingGateway.php");
$gateway=new AfricasTalkingGateway("sandbox","cfdc0c20fe5d21a63e976159890e39e40ba6a6d642d37c34b625af3e4469d5b7");
try
{

  $results = $gateway->sendMessage('+256706848422', 'Hello');
  foreach($results as $result) {
    echo $result->status;
  }
}
catch (AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
?>
