#!/bin/bash

if [ "$1" == --lib ]; then
    scp -r public_html/lib/ group14@donteatthat.ca:~/public_html/
elif [ "$1" == --js ]; then
    scp -r public_html/js/ group14@donteatthat.ca:~/public_html/
else
    scp public_html/*.* group14@donteatthat.ca:~/public_html/
fi
