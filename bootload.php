<?PHP
	namespace bootload;
	
	USE	Invoke;
		
	USE	Exception,
		ErrorException,
		ILLI\Core\Std\Throwable;
	
	try
	{
		require_once __DIR__.'/illi.php';
		
		Invoke\Init::illi();
		Invoke\Init::run();
	}
	catch(Throwable $T)
	{
		print $T->toTrack()->asText();
	}
	catch(Exception $E)
	{
		var_dump($E);
	}