#!/bin/bash

# Run this script from DonEatThat/
# Don't run it from the scripts/ directory

if [ "$1" == -r ]; then
    scp -r public_html/ group14@donteatthat.ca:~/
elif [ "$1" == -p ];  then
    scp public_html/*.* group14@donteatthat.ca:~/public_html/
    scp public_html/php/* group14@donteatthat.ca:~/public_html/php/
    scp public_html/classes/* group14@donteatthat.ca:~/public_html/classes/
else
    scp public_html/*.* group14@donteatthat.ca:~/public_html/
fi
