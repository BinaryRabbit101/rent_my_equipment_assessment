<?php

namespace App\Services;

class PdfService
{
    protected $xml;
    protected $items;
    protected $pdf;

    static function fetch(){
        $service = new static;

        $endpoint = config('assessment.xml-endpoint');

        $service->xml = simplexml_load_file($endpoint);

        return $service;
    }

    function parse(){
        $item_cap = config('assessment.item-cap');

        $this->items = collect();
        foreach($this->xml->channel->item as $item) {
            $image = $item->children('media', true)->attributes()['url'];

            $this->items->push([
                'title' => $item->title,
                'link' => $item->link,
                'image' => $image,
            ]);

            if($this->items->count() >= $item_cap){
                break;
            }
        }

        return $this;
    }

    function generate(){
        $this->pdf = \PDF::loadView('pdf.items', ['items' => $this->items]);

        return $this;
    }

    function stream(){
        return $this->pdf->stream();
    }
}
