<?php
namespace OGBitBlt\Output;
/** 
 * Defines the type of text compression being output
 */
enum OutputCompressionType 
{
    case None;
    case Gzip;
}