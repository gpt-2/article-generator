<?php
class gpt2com	{
    public $user_id; 
    public $api_key; 

public function generate($prefix)
{

$data = array(
	'clientId' => $this->user_id,
        'clientKey' => $this->api_key,
	'prefix' => $prefix,
	);

$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);
$context  = stream_context_create( $options );
$result = file_get_contents( "https://gpt-2.com/api/createTask", false, $context );
$response = json_decode( $result );
if ($response->errorCode<>0){
    return false;
    }
$task_id=$response->taskId;
$data2= array(
	'clientId' => $this->user_id,
        'clientKey' => $this->api_key,
	'taskId' => $task_id,
	);
$options2 = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data2 ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);
for ($k = 0 ; $k < 5; $k++)
{
    sleep(20);
    $context  = stream_context_create( $options2 );
    $result = file_get_contents( "https://gpt-2.com/api/getTaskResult", false, $context );
    $response = json_decode( $result );
    if ($response->status=="ready")
	{
	return $response->solution;
	}
}

}

}
?>
