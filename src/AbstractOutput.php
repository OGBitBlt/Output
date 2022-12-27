<?php
namespace OGBitBlt\Output;
/**
 * Abstract Class for all output objects
 */
abstract class AbstractOutput 
{
    private $compression = OutputCompressionType::None;
    private $encoding = OutputEncodingType::ASCII;
    private $stream = null;
    private $newline = "\n";
    private $prepend = "";
    private $append = "";
    private $format = "";

    /**
     * Writes output to the output stream 
     *
     * @param string $output
     * @param array $params
     * @return integer The number of characters written
     */
    public function Write(string $output, array $params = []) : int 
    {
        $nl = '';
        if(str_contains($output,$this->NewLine())) {
            $nl = $this->NewLine();
            $output = str_replace($this->NewLine(),'',$output);
        }
        $output = sprintf("%s%s%s%s",
            $this->PrependOutput(),
            $output,
            $this->AppendOutput(),
            $nl
        );
        if(array_key_exists('encoding',$params)) {
            switch($params['encoding']) {
                case OutputEncodingType::Base64:
                    $output = base64_encode($output);
                    break;
            }
        }
        if(array_key_exists('compression',$params)){
            switch($params['compression']){
                case OutputCompressionType::Gzip:
                    $output = gzdeflate($output,9);
                    break;
            }
        }
        $result = -1;
        if($this->OutputStream() == null) {
            $result = fwrite(STDOUT, $output, strlen($output));
        } else {
            $result = fwrite($this->OutputStream(), $output, strlen($output));
        }
        return $result;
    }

    /**
     * Writes output to the output stream and appends the new line character
     *
     * @param string $output
     * @param array $params
     * @return integer
     */
    public function WriteLn(string $output, array $params = []) : int 
    {
        $output = $output . $this->NewLine();
        return $this->Write($output,$params);
    }

    /**
     * Get / Set The text to be prepended to all output
     *
     * @param string|null $prepend
     * @return self|string
     */
    public function PrependOutput(string $prepend = null) : self|string 
    {
        if($prepend == null) return $this->prepend;
        else {
            $this->prepend = $prepend;
            return $this;
        }
    }

    /**
     * Get / Set The text to be appended to all output
     *
     * @param string|null $append
     * @return self|string
     */
    public function AppendOutput(string $append = null) : self|string 
    {
        if($append == null) return $this->append;
        else {
            $this->append = $append;
            return $this;
        }
    }
    /**
     * Get / Set the value for new line character
     *
     * @param string $char
     * @return self|string
     */
    public function NewLine(string $char = null) : self|string
    {
        if($char == null) return $this->newline;
        else {
            $this->newline = $char;
            return $this;
        }

    }

    /**
     * Get / Set the output encoding type
     *
     * @param [type] $encoding
     * @return self|OutputEncodingType
     */
    public function OutputEncoding(OutputEncodingType $encoding = null) : self|OutputEncodingType
    {
        if($encoding == null) return $this->encoding;
        else {
            $this->encoding = $encoding;
            return $this;
        }

    }

    /**
     * Get / Set the string used to format output
     *
     * @param string|null $format
     * @return self|string
     */
    public function OutputFormat(string $format = null) : self|string
    {
        if($format == null) return $this->format;
        else {
            $this->format = $format;
            return $this;
        }

    }

    /**
     * Get / Set the output compression
     *
     * @param OutputCompressionType|null $compression
     * @return self|OutputCompressionType
     */
    public function OutputCompression(OutputCompressionType $compression = null) : self|OutputCompressionType
    {
        if($compression == null) return $this->compression;
        else {
            $this->compression = $compression;
            return $this;
        }
    }

    /**
     * Get / Set the output stream
     *
     * @param [type] $stream
     * @return mixed
     */
    public function OutputStream($stream=null) : mixed
    {
        if($stream == null) return $this->stream;
        else {
            $this->stream = $stream;
            return $this;
        }
    }

    /**
     * Draw a line 
     *
     * @param string $output
     * @param integer $length
     * @return integer
     */
    public function DrawLn(string $output, int $length): int
    {
        return $this->WriteLn(str_repeat($output,$length));
    }
}
 ?>