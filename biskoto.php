<?php
class Biskoto{
    private $htmlString = "<span class='string'>string(%d) <pre>\"%s\"</pre></span>\r\n";
    private $htmlObject = "<details class='object'><summary>object(%d)</summary>%s</details>\r\n";
    private $htmlArray = "<details class='array'><summary>array(%d)</summary>%s</details>\r\n";
    private $htmlInteger = "<span class='integer'>integer \"%d\"</span>\r\n";
    private $htmlDouble = "<span class='double'>double \"%d\"</span>\r\n";
    private $htmlNull = "<span class='null'>null</span>\r\n";
    private $htmlBoolean = "<span class='boolean'>boolean \"%b\"</span>\r\n";

    function __construct(){
    }

    function createHtml(&$var, $deep = 100){
        $resultHtml = "";
        $props = "";
        switch(gettype($var)){
            case "array": {
                foreach($var as $key => $value){
                    $stringOfType = '..';
                    if($deep > 0){
                        $stringOfType = $this->createHtml($value, $deep-1);
                    }
                    $props .= sprintf("<dt>[%s]</dt><dd>%s</dd>\r\n", $key, $stringOfType);
                }
                $props = empty($props) ? $props : "<dl>". $props ."</dl>"; 
                $resultHtml .= sprintf($this->htmlArray, sizeof($var), $props);
                break;
            }
            case "object": {
                foreach(get_object_vars($var) as $key => $value){
                    $stringOfType = '..';
                    if($deep > 0){
                        $stringOfType = $this->createHtml($value, $deep-1);
                    }
                    $props .= sprintf("<dt>[%s]</dt><dd>%s</dd>\r\n", $key, $stringOfType);
                }
                $props = empty($props) ? $props : "<dl>". $props ."</dl>";
                $resultHtml .= sprintf($this->htmlObject, sizeof((array)$var), $props);
                break;
            }
            case "string": {
                $resultHtml .= sprintf($this->htmlString, strlen($var), $var);
                break;
            }
            case "boolean": {
                $resultHtml .= sprintf($this->htmlBoolean, $var);
                break;
            }
            case "integer": {
                $resultHtml .= sprintf($this->htmlInteger, $var);
                break;
            }
            case "double": {
                $resultHtml .= sprintf($this->htmlDouble, $var);
                break;
            }
            case "NULL": {
                $resultHtml .= sprintf($this->htmlNull);
                break;
            }
        }
        return $resultHtml;
    }
}