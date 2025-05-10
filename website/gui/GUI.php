<?php
class GUI
{
	private static $instance;
	public $componentsRenderFunctions = [];
	private $componentsCSS = [];
	private $componentsJS = [];

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

	public function getComponentHTML($componentName, $props = [])
	{
		return $this->componentsRenderFunctions[$componentName]($props);
	}

	public function addComponentCSS($css)
	{
		if ($css == "") return;
		$this->componentsCSS[] = $css;
	}

	public function getAllCSSText()
	{
		foreach ($this->componentsCSS as $cssText) {
			echo $cssText . "\n";
		}
	}

	public function addComponentJS($js)
	{
		if ($js == "") return;
		$this->componentsJS[] = $js;
	}

	public function getAllJSText()
	{
		foreach ($this->componentsJS as $jsText) {
			echo $jsText . "\n";
		}
	}
}

foreach (glob("gui/components/*.php") as $filename) {
	require_once $filename;
}
