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
            'amp'  => 'ampFilter' 
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

        $config = $this->getConfig();

        /* Converts $input into AMP compliant HTML */
        $html = (string)$input;
        $amp = new AMP();
        $amp->loadHtml($html);
        $amp_html = $amp->convertToAmpHtml();

        print $amp_html;

        if ($config['debug']['show_action_log'] == true) print($amp->warningsHumanText());
    }

}
