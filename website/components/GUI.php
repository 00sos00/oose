<?php
class GUI
{
	private static $instance;
	private $componentsRenderFunctions = [];
	private $componentsCSS = [];

	private function __construct() {}

	public static function getInstance()
	{
		if (!isset(GUI::$instance)) {
			GUI::$instance = new GUI();
		}

		return GUI::$instance;
	}

	public function addComponentRenderFunction($componentName, $renderFunction)
	{
		$this->componentsRenderFunctions[$componentName] = $renderFunction;
	}

	public function addComponentCSS($css)
	{
		if ($css == "") return;
		$this->componentsCSS[] = $css;
	}

	public function renderComponent($componentName, $props)
	{
		$this->componentsRenderFunctions[$componentName]($props);
	}

	public function renderAllCSS()
	{
		echo "<style>\n";
		foreach ($this->componentsCSS as $cssText) {
			echo $cssText . '\n';
		}
		echo "</style>";
	}
}

foreach (glob("components/*.php") as $filename) {
	if (basename($filename) != basename(__FILE__)) {
		include_once $filename;
	}
}
