#!/bin/bash

# Navigate to the parent directory to ensure we are at the project root
cd ..

# Get the name of the current directory (which should be the repository name)
REPO_NAME=$(basename "$(pwd)")

# Install dependencies and dump autoload
composer install --no-dev --optimize-autoloader

# Make replacements in composer autoload files
sed -i '' 's|src/src|src|g' src/vendor/composer/autoload_classmap.php
sed -i '' 's|src/src|src|g' src/vendor/composer/autoload_static.php
sed -i '' 's|\.\./\.\./\.\.|../..|g' src/vendor/composer/autoload_static.php

# Prompt for output directory
read -p "Enter the output directory for the built zip: " OUTPUT_DIR
mkdir -p "../$OUTPUT_DIR"  # Create the directory if it does not exist

# Create the zip
cd src  # Change to src directory to zip its contents
zip -r "$OUTPUT_DIR/$REPO_NAME.zip" ./*  # Zip all contents of src directly
cd ..  # Go back to the root directory

# Confirmation of build
echo "Build complete. Zip file located at: $OUTPUT_DIR/$REPO_NAME.zip"

# Navigate back to the bin directory to maintain the initial script execution state
cd bin