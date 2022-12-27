<?php
namespace OGBitBlt\Output;

class BrowserConsole extends AbstractOutput implements OutputInterface
{
    private $m_use_script_tags = true;

    public function Write(string $output, array $params = []): int
    {
        $js_code = 'console.log(' . json_encode($output,JSON_HEX_TAG) . ');';
        if($this->UseScriptTags() == true) {
            $js_code = "<script>" . $js_code . "</script>";
        }
        echo $js_code;
        return strlen($js_code);
    }

    public function WriteLn(string $output, array $params = []): int
    {
        return $this->Write($output,$params);
    }

    public function UseScriptTags(bool $flag = null) 
    {
        if($flag == null) return $this->m_use_script_tags;
        else {
            $this->m_use_script_tags = $flag;
            return $this;
        }
    }
}

?>