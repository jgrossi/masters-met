path_to_file="$1"
regex="(.+)/(.+)\.(pdf|PDF)"

[[ $path_to_file =~ $regex ]]
filename="${BASH_REMATCH[2]}"
only_path="${BASH_REMATCH[1]}"

python ./tools_source/citeseer/run_extraction.py "$1" "$only_path/$filename-output"