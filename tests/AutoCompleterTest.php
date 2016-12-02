<?php

namespace vendor\project\tests\units;

require_once 'vendor/bin/atoum';

include_once 'public_html/classes/AutoCompleter.php';

use \mageekguy\atoum;
use \vendor\project;

class AutoCompleter extends atoum\test
{

//    public function testApple() {
//        $config = include('config/config.php');
//        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
//
//        $response = $autoCompleter->getSuggestions("App");
//
//        $this->string($response[0])->isEqualTo("Apples");
//        $this->integer(count($response))->isLessThanOrEqualTo(6);
//    }

//    public function testBanana() {
//        $config = include('config/config.php');
//        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
//        
//        $response = $autoCompleter->getSuggestions("Ban");
//        
//        $this->string($response[0])->isEqualTo("Bananas");
//        $this->integer(count($response))->isLessThanOrEqualTo(6);
//    }

    public function testSingleSuggestion() {
        
        $config = include('config/config.php');
        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
        
        $numSearchTerms = $autoCompleter->setNumSuggestions(1);
        
        $response = $autoCompleter->getSuggestions("panc");
        
        $this->string($response[0])->isEqualTo("pancake");
    }

//    public function testTenSuggestions() {
//        $config = include('config/config.php');
//        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
//        
//        $numSearchTerms = $autoCompleter->setNumSuggestions(10);
//        
//        $response = $autoCompleter->getSuggestions("ap");
//        
//        $this->string($response[0])->isEqualTo("apple");
//        $this->integer(count($response))->isEqualTo(10);
//    }
}

?>
