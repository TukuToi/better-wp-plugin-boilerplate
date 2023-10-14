#!/bin/bash

# Ask for the input file path
echo "Enter the path for the input file:"
read input_path

# Ask for the input syntax
echo "Enter the input syntax (e.g., markdown, latex, see https://pandoc.org):"
read input_syntax

# Ask for the output syntax
echo "Enter the output syntax (e.g., html, pdf):"
read output_syntax

# Ask for the output file path
echo "Enter the path for the output file:"
read output_path

# Run pandoc with the provided details
pandoc "$input_path" -f "$input_syntax" -t "$output_syntax" -s -o "$output_path"

echo "Conversion completed!"
