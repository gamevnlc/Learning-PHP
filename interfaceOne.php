<?php
// Example #1 Interface example

//Declare the interface 'iTemplate'
interface iTemplate{
	public function setVariable($name, $var);
	public function getHtml($template);
}

//Implement the interface 
//This will work
	
class Template implements iTemplate
{
	
	private $vars = array();

	public function setVariable($name, $var)
	{
		$this->vars[$name] = $var;
	}

	public function getHtml($template)
	{
		foreach ($this->vars as $name => $value) {
			$template = str_replace('{'. $name . '}', $value, $template);	
		}
		return $template;
	}

}

// Example #2 Extendable Interfaces

interface a {
	public function foo();
}

interface b extends a {
	public function baz(Bazx $bar);
}

/**
* This will work
*/
class c implements b
{
	
	function __construct(argument)
	{
				
	}

	public function for()
	{
		# code...
	}

	public function baz(Baz $baz)
	{
		# code...
	}
}

// Example #3 Multiple interface inheritance

interface d
{
    public function foo();
}

interface e
{
    public function bar();
}

interface f extends d, e
{
    public function baz();
}

class g implements f
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}

// Example #4 Interfaces with constants

interface a
{
    const b = 'Interface constant';
}

// Prints: Interface constant
echo a::b;


// This will however not work because it's not allowed to 
// override constants.
class b implements a
{
    const b = 'Class constant';
}