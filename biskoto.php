<?php
class Biskoto{
    var $htmlString = "<span>string(%d) \"%s\"</span>";
    var $htmlObject = "<details><summary>object(%d)</summary></details>";
    var $htmlArray = "<details><summary>array(%d)</summary>%s</details>";
    var $htmlInteger = "<span>integer \"%d\"</span>";
    var $htmlDouble = "<span>double \"%d\"</span>";
    var $htmlNull = "<span>null</span>";
    var $htmlBoolean = "<span>boolean \"%b\"</span>";

    function __construct(){
    }

    function createHtml(&$var, $deep){
        $resultHtml = "";
        $props = "";
        switch(gettype($var)){
            case "array": {
                foreach($var as $key => $value){
                    $stringOfType = '..';
                    if($deep > 0){
                        $stringOfType = $this->createHtml($value, $deep-1);
                    }
                    $props .= sprintf("<dt>[%s]</dt><dd>%s</dd>", $key, $stringOfType);
                }
                $resultHtml .= sprintf($this->htmlArray, sizeof($var), $props);
                break;
            }
            case "object": {
                foreach($var as $key => $value){
                    $stringOfType = '..';
                    if($deep > 0){
                        $stringOfType = $this->createHtml($value, $deep-1);
                    }
                    $props .= sprintf("<dt>[%s]</dt><dd>%s</dd>", $key, $stringOfType);
                }
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