#! /bin/bash

path_to_file="$1"
regex="(.+)/(.+)\.(pdf|PDF)"

[[ $path_to_file =~ $regex ]]
filename="${BASH_REMATCH[2]}"
only_path="${BASH_REMATCH[1]}"
outputdir="$only_path/$filename-output"

python ./tools/citeseer/run_extraction.py "$1" "$outputdir"

cat "$outputdir/$filename.header"
tail -n +2 "$outputdir/$filename.header.tei"
tail -n +2 "$outputdir/$filename.cite"

rm -fr "$outputdir"