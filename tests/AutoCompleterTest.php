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
//        $response = json_decode($autoCompleter->getSuggestions("App"), true);
//
//        $this->string($response[0])->isEqualTo("Apples");
//        $this->integer(count($response))->isLessThanOrEqualTo(6);
//    }

//    public function testBanana() {
//        $config = include('config/config.php');
//        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
//        
//        $response = json_decode($autoCompleter->getSuggestions("Ban"), true);
//        
//        $this->string($response[0])->isEqualTo("Bananas");
//        $this->integer(count($response))->isLessThanOrEqualTo(6);
//    }

    public function testSingleSuggestion() {
        
        $config = include('config/config.php');
        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
        
        $numSearchTerms = $autoCompleter->setNumSuggestions(1);
        
        $response = json_decode($autoCompleter->getSuggestions("panc"), true);
        
        $this->string($response[0])->isEqualTo("Plain Pancakes");
    }

//    public function testTenSuggestions() {
//        $config = include('config/config.php');
//        $autoCompleter = new project\AutoCompleter($config['consumer_key'], $config['secret_key']);
//        
//        $numSearchTerms = $autoCompleter->setNumSuggestions(10);
//        
//        $response = json_decode($autoCompleter->getSuggestions("ap"), true);
//        
//        $this->string($response[0])->isEqualTo("apple");
//        $this->integer(count($response))->isEqualTo(10);
//    }
}

?>
