#!/bin/bash

# Define the search and replace strings
search_string="https://18.220.246.60/teep"
replace_string="https://18.220.246.60/teep"

# Loop through all files in the current directory
for file in *
do
  # Check if the file is a regular file (not a directory)
  if [ -f "$file" ]; then
    # Use sed to perform the search and replace in-place (-i) on each file
    sed -i "s#$search_string#$replace_string#g" "$file"
    echo "Updated $file"
  fi
done

