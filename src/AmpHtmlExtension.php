<?php

namespace Bolt\Extension\JamesIves\AmpHtml;

use Bolt\Extension\SimpleExtension;
use Lullabot\AMP\AMP;

/**
 * AmpHtml extension class.
 *
 * @author James Ives <iam@jamesiv.es>
 */
class AmpHtmlExtension extends SimpleExtension
{

    /**
    * {@inheritdoc}
    */
    protected function registerTwigFilters()
    {
        return [
            'amp'  => 'ampFilter',
            'ampraw' => 'ampReturn' 
        ];
    }

    protected function getDefaultConfig()
    {
        return [
            'debug' => [
                'show_action_log' => false
            ]
        ];
    }

    public function ampFilter($input)
    {
        /* Converts $input into AMP compliant HTML and prints it on the page. */
        $config = $this->getConfig();
        $amp_html = $this->ampReturn($input);
        echo $amp_html;
    }

    public function ampReturn($input)
    {
        /* Converts $input into AMP compliant HTML but returns it to the calling filter or function
        this allows you to do things such as   
        
        {% setcontent body = record.body|ampraw %}
        {% if 'amp-youtube' in body %}
        {% endif %} */

        $html = (string)$input;
        $amp = new AMP();
        $amp->loadHtml($html);
        $amp_html = $amp->convertToAmpHtml();
        if ($config['debug']['show_action_log'] == true) print($amp->warningsHumanText());

        return $amp_html;
    }
}
