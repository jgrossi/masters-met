<?php 

namespace App;

use App\Extractors\Cermine;
use App\Extractors\CiteSeer;
use App\Extractors\CrossRef;
use App\Extractors\ParsCit;
use Exception;

class ExtractorFactory
{
    private function __construct()
    {

    }

    public static function create($toolName, $output)
    {
        switch ($toolName) {
            case 'cermine':
                return new Cermine($output);
                break;

            case 'citeseer':
                return new CiteSeer($output);
                break;

            case 'crossref':
                return new CrossRef($output);
                break;

            case 'parscit':
                return new ParsCit($output);
                break;
            
            default:
                throw new Exception("Cannot find $toolName extractor class");
                break;
        }
    }
}