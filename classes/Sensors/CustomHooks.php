<?php
/**
 * Class used for to allow developers to create custom
 * alerts
 */
class WSAL_Sensors_CustomHooks extends WSAL_AbstractSensor
{
    public function HookEvents()
    {
        /**
         * For each hook use add_action() and pass:
         * @param string sample_hook_name
         * @param string SampleFunction is the name of the function above
         * @param int 10 priority (Optional)
         * @param int 2 number of parameters passed to the function (Optional)(Check the hook documentation)
         * @see http://adambrown.info/p/wp_hooks
         */
        add_action('sample_hook_name', array($this, 'SampleFunction'), 10, 2);
    }
    
    /**
     * Sample function with 0 or more parameters,
     * create one function for each hook
     * @param anyType $paramname (Optional)
     */
    public function SampleFunction($value_1 = null, $value_2 = null)
    {
        /**
         * @var int (4 digit) $alertCode Alert code (3 types of criticality level)
         * @example Critical 2222, Warning 3333, Notice 4444
         */
        $alertCode = 2222;

        /**
         * @var string alert text
         */
        $alertText = 'Sample alert text';

        /**
         * @var array $variables used in the alert (With 1 or more elements)
         * { @var string $alertText }
         */
        $variables = array(
            'CustomAlertText' => $alertText
        );

        $this->plugin->alerts->Trigger($alertCode, $variables);
    }
}
