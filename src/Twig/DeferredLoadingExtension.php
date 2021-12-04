<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DeferredLoadingExtension extends AbstractExtension
{
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('deferred_load', [$this, 'deferred_load'],['is_safe' => ['html']]),
        ];
    }
    
   
    public function deferred_load(array $urls=[],$defer_time=1000):string
    {
        $script = '<script type="text/javascript">
	    function downloadJS(urls) {
	    	for (let url of urls) {
                let element = document.createElement("script");
                element.src = url;
                document.body.appendChild(element);
		    }
	    }
	    
	    setTimeout(function() {
	      downloadJS('.json_encode($urls).');
	    },'.$defer_time.');';
	    
        $script .= '</script>';
        return $script;
    }
}
