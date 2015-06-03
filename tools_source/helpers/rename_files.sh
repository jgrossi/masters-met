#!/bin/bash 

directory="$1"
files="$directory*.pdf"

for path in $files
do
	filename="${path##*/}"
	new_filename=`echo $filename | tr " " "-"`
	new_path="$directory$new_filename"
	mv "$path" "$new_path"
done
