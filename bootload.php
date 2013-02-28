<?PHP
	namespace bootload;
	
	USE	Server,
		Invoke;
		
	USE	Exception,
		ErrorException,
		ILLI\Core\Std\Throwable;
try
{
	require_once __DIR__.'/illi.php';
	
	Server\Init::setup();
	Server\Init::development();
	Server\Init::debug();
	
	Invoke\Init::illi();
}
catch(Throwable $T)
{
	print $T->toTrack()->asText();
}
catch(Exception $E)
{
	var_dump($E);
}