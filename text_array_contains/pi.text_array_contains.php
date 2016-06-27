<?php

$plugin_info = array(
    'pi_name' => 'Thotbox: Text Array Contains',
    'pi_author' =>'Shane Woodward',
    'pi_description' => 'Test if array stored as string contains a value.',
    'pi_version' =>'1.0',
    'pi_usage' => text_array_contains::usage()
);

class text_array_contains {

    public function __construct() {
        $this->return_data = $this->output();
    }

    public function output() {
        $this->EE =& get_instance();
        $string = $this->EE->TMPL->fetch_param('string');
        $array = $this->EE->TMPL->fetch_param('array');
        $separator = $this->EE->TMPL->fetch_param('separator');

        $array = explode($separator, $array);
        
        if (in_array($string, $array)) {
            $result = 'Yes';
        } else {
            $result = 'No';
        }

        return $result;
    }

    public static function usage() {
        ob_start();
    ?>
        Use {exp:text_array_contains string="" array="" separator=""} to return Yes/No response.
    <?php
        $text = ob_get_contents();
        ob_end_clean();
        return $text;
    }

}

?>