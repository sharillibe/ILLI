<?PHP
	NAMESPACE ILLI\Core\Std\Throwable;
	USE ILLI\Core\Std\Throwable\Log;
	USE ILLI\Core\Std\Throwable\External;
	USE ILLI\Core\Std\IThrowable;
	USE ILLI\Core\Util\String;
	USE ILLI\Core\Shell\Lib;
	
	CLASS Export
	{
		CONST MESSAGE	= 'ILLI\Core\Std\Throwable\Export::MESSAGE';
		CONST TRACK	= 'ILLI\Core\Std\Throwable\Export::TRACK';
		
		protected static $__pattern =
		[
			#:templates:
				#:plain:
				'asText' =>
				[
					'main' =>
					[
						'{:name}',
						'',
						'	HADDR	{:haddr}',
						'	EADDR	{:eaddr}',
						'',
						'{:raddr}',
						'',
						''
					],
					self::MESSAGE =>
					[
						'entry' =>
						[
							'		{:eom}',
							'',
							'		{:name}',
							'',
							'		NODE {:addr}',
							'		HASH {:hash} | TYPE {:type} | STATUS {:solved} | CODE {:code}',
							'',
							'		{:eof}',
							'',
							'		{:message}',
							'',
							'		{:eof}',
							'',
							'		TRIGGER',
							'		{:trigger}',
							'		(',
							'{:args}',
							'		)',
							'',
							'		{:eom}',
						]
					],
					self::TRACK =>
					[
						'entry' =>
						[
							'		{:eom}',
							'',
							'		{:name}',
							'',
							'		NODE {:addr}',
							'		HASH {:hash} | TYPE {:type} | STATUS {:solved} | CODE {:code}',
							'',
							'		NEXT {:naddr}',
							'		PREV {:paddr}',
							'',
							'		{:eof}',
							'',
							'		{:message}',
							'',
							'		{:eof}',
							'',
							'		TRIGGER',
							'		{:trigger}',
							'		(',
							'{:args}',
							'		)',
							'',
							'		SOURCE',
							'{:source}',
							'',
							'		THROWN IN',
							'		{:line} {:file}',
							'',
							'		TRACE',
							'		{:trace}',
							'',
							'		{:eom}',
						],
						'method' =>
						[
							'{:line} {:file} {:method}'
						]
					]
				],
				#::
				#:XML:
				'asXml' => []
				#::
			#::
		];
		
		protected $__data 	= [];
		protected $__case	= NULL;
		
		#:collectors:
		
		public static function message(IThrowable $__IThrowable)
		{
			$r = [];
			
			foreach(array_reverse(Log::getAddressStack($__IThrowable->getAddress())) as $i => $E)
			{
				$r['eaddr'][] = $E->getCode();
				$r['haddr'][] = $E->getHashCode();
				$r['stack'][] =
				[
					'name'		=>	static::selectName($E),
					'type'		=>	static::selectType($E),
					'code'		=>	static::selectCode($E),
					'hexcode'	=> 	static::selectHexCode($E),
					'hash'		=>	static::selectHashCode($E),
					'message'	=>	static::selectMessage($E),
					'solved'	=>	static::selectSolved($E),
					'addr'		=>	static::selectAddr($E),
					'fire.args'	=>	static::selectFireArgs($E),
					'fire.class'	=>	static::selectFireClass($E),
					'fire.type'	=>	static::selectFireType($E),
					'fire.function'	=>	static::selectFireFunction($E),
					'fire.line'	=>	static::selectFireLine($E),
					'fire.file'	=>	static::selectFireFile($E)
				];
			}
			
			$c = get_called_class();
			return new $c($r, self::MESSAGE);
		}
		
		public static function set($__addressString)
		{
		}
		
		public static function stack($__addressString)
		{
		}
		
		public static function track(IThrowable $__IThrowable)
		{
			$r = [];
			
			foreach(array_reverse(Log::getAddressStack($__IThrowable->getAddress())) as $i => $E)
			{
				$r['eaddr'][] = $E->getCode();
				$r['haddr'][] = $E->getHashCode();
				$r['stack'][] =
				[
					'name'		=>	static::selectName($E),
					'type'		=>	static::selectType($E),
					'code'		=>	static::selectCode($E),
					'hexcode'	=> 	static::selectHexCode($E),
					'hash'		=>	static::selectHashCode($E),
					'message'	=>	static::selectMessage($E),
					'solved'	=>	static::selectSolved($E),
					'file'		=>	static::selectFile($E),
					'line'		=>	static::selectLine($E),
					'addr'		=>	static::selectAddr($E),
					'prev'		=>	static::selectPrevAddr($E),
					'next'		=>	static::selectNextAddr($E),
					'trace'		=>	static::selectCollection($E),
					'fire.args'	=>	static::selectFireArgs($E),
					'fire.method'	=>	static::selectFireMethod($E),
					'fire.class'	=>	static::selectFireClass($E),
					'fire.type'	=>	static::selectFireType($E),
					'fire.function'	=>	static::selectFireFunction($E),
					'fire.line'	=>	static::selectFireLine($E),
					'fire.file'	=>	static::selectFireFile($E),
					'fire.source'	=>	static::selectFireSource($E)
				];
			}
			
			$c = get_called_class();
			return new $c($r, self::TRACK);
		}
		
		#::
		
		#:formatters:
		
		public function asText()
		{
			$formatType 		= function($type) { return $type; };
			$formatHash 		= function($hash) { return $hash; };
			$formatAddr 		= function($addr) { return $addr; };
			$formatPAddr 		= function($pAddr) { return $pAddr; };
			$formatNAddr 		= function($nAddr) { return $nAddr; };
			$formatSolved		= function($solved) { return $solved; };
			$formatCode		= function($hexcode) { return $hexcode; };
			$formatName		= function($name) { return implode(':', $name); };
			$formatEoM		= function($width = 120) { return str_repeat('█', $width); };
			$formatEoF		= function($width = 120) { return str_repeat('═', $width); };
			$formatMessage		= function($message, $width = 120) { return wordwrap($message, $width, PHP_EOL."\t\t"); };
			$formatLine 		= function($line) { return str_pad($line, 8, (is_numeric($line) ? '0' : ' '), (is_numeric($line) ? STR_PAD_LEFT : STR_PAD_RIGHT)); };
			$formatFile 		= function($file) { return str_pad(static::preparePath($file), 51, ' ', STR_PAD_RIGHT); };
			$formatMethod		= function($class, $type, $func) { return $class.$type.$func; };
			$formatFireArgs		= function($args) { return String::lrepeat(static::prepareArgs($args), "\t", 3); };
			$formatFireFile		= function($file) use ($formatFile) { return $formatFile($file); };
			$formatFireLine		= function($line) use ($formatLine) { return $formatLine($line); };
			$formatFireMethod	= function($class, $type, $func) use ($formatMethod) { return $formatMethod($class, $type, $func); };
			$formatFireSource	= function($source) { if(!$source) return NULL; return String::lrepeat(implode(PHP_EOL, static::prepareSource($source)), "\t", 2); };
			$formatTraceFile	= function($file) use ($formatFile) { return $formatFile($file); };
			$formatTraceLine	= function($line) use ($formatLine) { return $formatLine($line); };
			$formatTraceMethod	= function($class, $type, $func) use ($formatMethod) { return $formatMethod($class, $type, $func); };
			$formatTrace		= function($trace) { return implode(PHP_EOL."\t\t", $trace); };
			$formatHaddr		= function($haddr) { return implode(':', $haddr); };
			$formatEaddr		= function($eaddr) { return implode(':', $eaddr); };
			$formatResult		= function($result) { return implode(PHP_EOL.PHP_EOL, $result); };
			
			switch($this->__case):
				case self::MESSAGE:
				
					$r = [];
					foreach($this->__data['stack'] as $e)
					{
						$r[] = String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__][self::MESSAGE]['entry']),
						[
							'eom'		=> $formatEoM(),
							'eof'		=> $formatEoF(),
							'type'		=> $formatType($e['type']),
							'hash'		=> $formatHash($e['hash']),
							'addr'		=> $formatAddr($e['addr']),
							'solved'	=> $formatSolved($e['solved']),
							'code'		=> $formatCode($e['hexcode']),
							'name'		=> $formatName($e['name']),
							'message'	=> $formatMessage($e['message']),
							'args'		=> $formatFireArgs($e['fire.args']),
							'trigger'	=> String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__][self::TRACK]['method']),
							[
								'line'		=> $formatFireLine($e['fire.line']),
								'file'		=> $formatFireFile($e['fire.file']),
								'method'	=> $formatFireMethod($e['fire.class'], $e['fire.type'], $e['fire.function'])
							]),
						]);
					}
					
					return String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__]['main']),
					[
						'name'	=> self::MESSAGE,
						'haddr'	=> $formatHaddr($this->__data['haddr']),
						'eaddr'	=> $formatEaddr($this->__data['eaddr']),
						'raddr'	=> $formatResult($r)
					]);
					
					break;
					
				case self::TRACK:
				
					$r = [];
					foreach($this->__data['stack'] as $e)
					{
						$trace = [];
						
						foreach(['self', 'import'] as $w)
						{
							if(FALSE === isset($e['trace'][$w]))
								continue;
							
							foreach(static::prepareTrace($e['trace'][$w]) as $i)
							{
								$trace[] = String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__][self::TRACK]['method']),
								[
									'method'	=> $formatTraceMethod($i['class'], $i['type'], $i['function']),
									'file'		=> $formatTraceFile($i['file']),
									'line'		=> $formatTraceLine($i['line']),
								]);
							}
						}
						
						$r[] = String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__][self::TRACK]['entry']),
						[
							'eom'		=> $formatEoM(),
							'eof'		=> $formatEoF(),
							'type'		=> $formatType($e['type']),
							'hash'		=> $formatHash($e['hash']),
							'addr'		=> $formatAddr($e['addr']),
							'solved'	=> $formatSolved($e['solved']),
							'code'		=> $formatCode($e['hexcode']),
							'name'		=> $formatName($e['name']),
							'message'	=> $formatMessage($e['message']),
							'line'		=> $formatLine($e['line']),
							'file'		=> $formatFile($e['file']),
							'paddr'		=> $formatPAddr($e['prev']),
							'naddr'		=> $formatNAddr($e['next']),
							'trace'		=> $formatTrace($trace),
							'args'		=> $formatFireArgs($e['fire.args']),
							'source'	=> $formatFireSource($e['fire.source']),
							'trigger'	=> String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__][self::TRACK]['method']),
							[
								'line'		=> $formatFireLine($e['fire.line']),
								'file'		=> $formatFireFile($e['fire.file']),
								'method'	=> $formatFireMethod($e['fire.class'], $e['fire.type'], $e['fire.function'])
							]),
						]);
						
					}
					
					return String::insert(implode(PHP_EOL, static::$__pattern[__FUNCTION__]['main']),
					[
						'name'	=> self::TRACK,
						'haddr'	=> $formatHaddr($this->__data['haddr']),
						'eaddr'	=> $formatEaddr($this->__data['eaddr']),
						'raddr'	=> $formatResult($r)
					]);
					
					break;
			endswitch;
		}
		
		#::
		
		#:selectors:
		
		public static function selectName(IThrowable $__IThrowable)
		{
			return $__IThrowable instanceOf External ? [get_class($__IThrowable), get_class($__IThrowable->getExternal())] : [get_class($__IThrowable)];
		}
		
		public static function selectType(IThrowable $__IThrowable)
		{
			return TRUE === $__IThrowable->hasPrevious() ? TRUE === $__IThrowable->hasNext() ? 'INNER' : 'OUTER' : 'FIRED';
		}
		
		public static function selectCode(IThrowable $__IThrowable)
		{
			return $__IThrowable->getCode();
		}
		
		public static function selectHexCode(IThrowable $__IThrowable)
		{
			return '0x'.dechex($__IThrowable->getCode());
		}
		
		public static function selectHashCode(IThrowable $__IThrowable)
		{
			return $__IThrowable->getHashCode();
		}
		
		public static function selectMessage(IThrowable $__IThrowable)
		{
			return $__IThrowable->getMessage();
		}
		
		public static function selectSolved(IThrowable $__IThrowable)
		{
			return TRUE === $__IThrowable->isSolved() ? 'SOLVED' : 'UNSOLVED';
		}
		
		public static function selectFile(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFile();
		}
		
		public static function selectLine(IThrowable $__IThrowable)
		{
			return $__IThrowable->getLine();
		}
		
		public static function selectAddr(IThrowable $__IThrowable)
		{
			return $__IThrowable->getAddress();
		}
		
		public static function selectNextAddr(IThrowable $__IThrowable)
		{
			return TRUE === $__IThrowable->hasNext() ? $__IThrowable->getNext()->getAddress() : 'NULL';
		}
		
		public static function selectPrevAddr(IThrowable $__IThrowable)
		{
			return TRUE === $__IThrowable->hasPrevious() ? $__IThrowable->getPrevious()->getAddress() : 'NULL';
		}
		
		public static function selectCollection(IThrowable $__IThrowable)
		{
			return $__IThrowable instanceOf External ? ['import' => $__IThrowable->getExternal()] : ['self' => $__IThrowable];
		}
		
		public static function selectFireArgs(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireArgs();
		}
		
		public static function selectFireClass(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireClass();
		}
		
		public static function selectFireType(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireType();
		}
		
		public static function selectFireFunction(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireFunction();
		}
		
		public static function selectFireLine(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireLine();
		}
		
		public static function selectFireFile(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireFile();
		}
		
		public static function selectFireSource(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireSource();
		}
		
		public static function selectFireMethod(IThrowable $__IThrowable)
		{
			return $__IThrowable->getFireMethod();
		}
		
		#::
		
		#:prepare:
		
		public static function prepareSource($__source)
		{
			$r = [];
			
			return $__source;
		}
		
		public static function prepareArgs($__args)
		{
			$r = [];
			foreach($__args as $i => $a)
				$r[] = $i.String::lrepeat(String::dump($a), "\t", 1);
			
			return implode(PHP_EOL, $r);
		}
		
		public static function preparePath($__path)
		{
			return str_replace([Lib::AppPath(), Lib::LibPath(), $_SERVER['PHP_DOCUMENT_ROOT'], '.php'], ['', '', '', '.ddl'], $__path);
		}
		
		public static function prepareTrace(\Exception $__Exception)
		{
			$m = [];
			
			foreach(array_reverse($__Exception->getTrace()) as $i => $l)
			{
				$m[] = $l +
				[
					'class'		=> '[php]',
					'line'		=> '[php]',
					'file'		=> '[php]',
					'type'		=> '::',
					'function'	=> '',
					'args'		=> []
				];
			}
			
			return $m;
		}
		
		#::
		
		protected function __construct(array $__data, $__case)
		{
			$this->__data = $__data;
			$this->__case = $__case;
		}
	}