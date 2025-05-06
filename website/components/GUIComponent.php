<?php
$globalCSS = [];

class GUIComponent
{
	public $html;

	public function __construct($iHtml)
	{
		$this->html = $iHtml;
	}

	public function render()
	{
		echo $this->html;
	}
}

function addCSS($css)
{
	global $globalCSS;
	$globalCSS[] = trim($css);
}

function renderCSS()
{
	echo "<style>\n";
	global $globalCSS;
	foreach ($globalCSS as $cssCode) {
		echo $cssCode . "\n";
	}
	echo "</style>";
}
