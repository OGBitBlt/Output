<?php
namespace OGBitBlt\Output;

use Exception;

/**
 * Implements output to a text file
 */
class TextFile extends AbstractOutput implements OutputInterface
{
    private $m_file = '';

    public function __construct(string $file)
    {
        $this->m_file = $file;
    }

    public function __destruct()
    {
    }

    public function Write(string $output, array $params = []): int
    {
        $handle = fopen($this->m_file, "a");
        if($handle !== false) {
            $this->OutputStream($handle);
        }
        $result = parent::Write($output,$params);
        fclose($this->OutputStream());
        return $result;
    }
}
?>