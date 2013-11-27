# Codeigniter - Template Engine v0.1
## Requirements
1. PHP 5.2 or greater
2. CodeIgniter 2.1+

## What's it?


## Installation
Copy `application/libraries/Template.php` to your project folder.

Make sure that your `application/cache` folder have permissions to write (0755).

Add `template` to libraries autoload or load this library in your controller.

## Usage

###Sample variables
####Controller:

    <?php
    public function index()
    {
        $data = array('sample_var' => 'SAMPLE_VAR', 'var_with_html' => 'Var with <b>HTML</b>');
        $this->template->parse_view('welcome_message.php', $data);
    }
    ?>

####View:
    {{sample_var}}
    {{!var_with_html}}

####Output:
    SAMPLE_VAR
    Var with <b>HTML</b>
###Boolean variables
####Controller:
    <?php
    public function index()
    {
        $data = array('true_var' => true);
        $this->template->parse_view('welcome_message.php', $data);
    }
    ?>
####View:
    ((ture_var))You can see this text, because ture_var set in TRUE ((/ture_var))
    ((!ture_var))And you can not see this text, because ture_var not equal to FALSE((/ture_var))
####Output:
    You can see this text, because ture_var set in TRUE!
###Arrays
####Controller:
    <?php
    public function index()
    {
        $data = array();
        $data['list'][] = array('name' => 'John', 'age' => 41);
        $data['list'][] = array('name' => 'Andy', 'age' => 17);
        $data['list'][] = array('name' => 'Dany', 'age' => 28);
        $this->template->parse_view('welcome_message.php', $data);
    }
    ?>
####View:
    [[list]]
        <p>NAME: {{list.name}}, AGE: {{list.age}}</p>
    [[/list]];
####Output:
    NAME: John, AGE: 41
    NAME: Andy, AGE: 17
    NAME: Dany, AGE: 28
