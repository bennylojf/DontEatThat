[![Build Status](https://travis-ci.com/Alexmac22347/DontEatThat.svg?token=Dp1JTmix1PPSSRxKqqsj&branch=master)](https://travis-ci.com/Alexmac22347/DontEatThat)

# Don't Eat That Web Application

A web application that allows a user to be able to make healthier food choices.

## Getting Started

The files in public_html should be placed in a folder which is to be hosted
on the internet. We use a web host which was purchased from godaddy.com

Certain php scripts require Oath keys or MySQL username/password/database names.
These can be placed in a file: config/config.php

Here is an example of a config.php file:
```
<?php

return array(
    'consumer_key' => 'fatsecret_consumer_key',
    'secret_key' => 'fatsecret_secret_key',
    'database_username' => 'mysql_username',
    'database_password' => 'mysql_password',
    'database_hostname' => 'mysql_hostname',
    'database_name' => 'mysql_database_name'
);

?>

```

## Authors
Benny Lo - https://github.com/blo2569  
Charn Rai - https://github.com/charnrai  
Alex Macdonald - https://github.com/Alexmac22347  
Adil Kydyrbayev - https://github.com/Adil9551  
Kenton Ma - https://github.com/KentonMa  
