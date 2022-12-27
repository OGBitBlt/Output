<?php
namespace OGBitBlt\Output;
/**
 * Implements the Console output object
 */
class Console extends AbstractOutput implements OutputInterface 
{
    /**
     * array of template variables for colors
     *
     * @var array
     */
    private $color_search = [
        "%RED(",
        "%GREEN(",
        "%YELLOW(",
        "%BLUE(",
        "%MAGENTA(",
        "%CYAN(",
        "%LGRAY(",
        "%DGRAY(",
        "%LRED(",
        "%LGREEN(",
        "%LYELLOW(",
        "%LBLUE(",
        "%LMAGENTA(",
        "%LCYAN(",
        "%WHITE(",
        ")"
    ];

    /**
     * array of terminal commands for changing text color
     *
     * @var array
     */
    private $color_replace = [
        "\e[31m",
        "\e[32m",
        "\e[33m",
        "\e[34m",
        "\e[35m",
        "\e[36m",
        "\e[37m",
        "\e[90m",
        "\e[91m",
        "\e[92m",
        "\e[93m",
        "\e[94m",
        "\e[95m",
        "\e[96m",
        "\e[97m",
        "\e[39m"
    ];

    /**
     * Writes output to the console 
     *
     * @param string $output
     * @param array $params
     * @return integer
     */
    public function Write(string $output, array $params = []): int
    {
        $output = str_replace(
            $this->color_search,
            $this->color_replace,
            $output
        );

        $this->PrependOutput(
            str_replace(
                $this->color_search, 
                $this->color_replace,
                $this->PrependOutput()
            )
        );

        $this->AppendOutput(
            str_replace(
                $this->color_search,
                $this->color_replace,
                $this->AppendOutput()
            )
        );
        
        return parent::Write($output, $params);
    }

    /**
     * Writes output to the console
     *
     * @param string $output
     * @param array $params
     * @return integer
     */
    public function WriteLn(string $output, array $params = []): int
    {
        return parent::WriteLn($output, $params);
    }

    /**
     * Clears the console screen
     *
     * @return void
     */
    public function Clear()
    {
        echo "\e[H\e[J";
    }

    /**
     * Emulates typing
     *
     * @param string $output
     * @return void
     */
    public function Type(string $output) : int  
    {
        for($i=0;$i<strlen($output);$i++) {
            $delay=rand(0,100000);
            $this->Write($output[$i]);
            usleep($delay);
        }
        return strlen($output);
    }
}
 ?>