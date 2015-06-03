pdf_filename="$1"
regex="(.+)\.(pdf|PDF)"

[[ $pdf_filename =~ $regex ]]
filename="${BASH_REMATCH[1]}"
txt_filename="$filename.txt"

pdftotext "$pdf_filename" "$txt_filename"
./tools_source/parscit/bin/citeExtract.pl -m extract_all "$txt_filename"
rm -f "$txt_filename"