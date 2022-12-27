<?php
namespace OGBitBlt\Output;
/**
 * I just like object factories
 */
class OutputFactory
{
    /**
     * Factory create method for creating an output object
     *
     * @param string $className
     * @param array $params
     * @return OutputInterface a new output object or null
     */
    public static function Create(string $className,$params=[]) : OutputInterface | null 
    {
        switch($className) 
        {
            case Console::class: return new Console();
            case TextFile::class: return new TextFile($params['file']);
            case BrowserConsole::class: return new BrowserConsole();
        }
    }
}
?>