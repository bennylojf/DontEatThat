#!/bin/bash

if [ "$1" == --lib ]; then
    scp -r public_html/lib/ group14@donteatthat.ca:~/public_html/lib/
elif [ "$1" == --js ]; then
    scp -r public_html/js/ group14@donteatthat.ca:~/public_html/js/
else
    scp public_html/*.* group14@donteatthat.ca:~/public_html/
fi
