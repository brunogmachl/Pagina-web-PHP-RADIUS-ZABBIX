#!/bin/bash

cat lista$1 | while read line

do


if [[ `ps -ef | grep soap | wc -l` -gt 40 ]]
    then
        sleep 120
fi


w=$( echo ${line} | cut -d\; -f1);
z=$( echo ${line} | cut -d\; -f2);

./lucas_script_log.sh $1 $w $z &

sleep 2

done
