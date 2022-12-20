<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use simplehtmldom\HtmlDocument;

class StatusesController extends Controller
{
    protected HtmlDocument $lib;

    public function __construct(HtmlDocument $lib)
    {
        $this->lib = $lib;
    }

    public function getStatus($html)
    {
        $html = $this->lib->load($html);
        $element = $html->find('meta[name=og:domain-token]');

        if (count($element) == 0 || $element[0]->getAttribute('content') != 'SQse0DDrnIS2COT8ceqopAiixmPG4KRm') {
            return false;
        } else {
            return true;
        }
    }
}
