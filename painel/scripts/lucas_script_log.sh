#!/bin/bash

w=$2;
z=$3;

./soap_request.sh delete ${w}; sleep 10;
./soap_request.sh ingest ${w} ${z} >> ingest_error$1_${w}.log;
echo "${w};${z}" >> history_lista$1.log;
cat ingest_error$1_${w}.log >> history_lista$1.log;

V1=$(cat ingest_error$1_${w}.log | grep SUCCESS | wc -l );

if [ "$V1" == 0 ];
then
echo "${w};${z}" >> ingests_com_error_lista$1.log;
rm ingest_error$1_${w}.log;
else
echo "${w};${z}" >> ingests_ok_lista$1.log;
rm ingest_error$1_${w}.log;
fi
