<?php
namespace OGBitBlt\Output;
/**
 * Provides the interface that all output objects inherit from.
 */
interface OutputInterface 
{
    public function Write(string $output, array $params = []) : int;
    public function WriteLn(string $output, array $params = []) : int;
    public function DrawLn(string $output, int $length): int;
    public function PrependOutput(string $prepend = null);
    public function AppendOutput(string $append = null);
    public function NewLine(string $char = null);
    public function OutputEncoding(OutputEncodingType $encoding = null);
    public function OutputFormat(string $format = '');
    public function OutputCompression(OutputCompressionType $compression = null);
    public function OutputStream($stream=STDOUT);
}
?>
