#!/bin/bash

# Ask for the tag to release
echo "Tag to release. Example 1.0.0:"
read release_tag

# Ask for the Tag message
echo "Tag message (title).  Example 1.0.0:"
read release_message

# Create new tag and push release
git tag -a "$release_tag" -m "$release_message"

if [ $? -eq 0 ]; then
    echo "Tag $release_tag created successfully. Pushing to origin and cretaing release..."
    git push origin "$release_tag"

	# Check if the push was successful
    if [ $? -eq 0 ]; then
        echo "Tag $release_tag pushed successfully. Release is done!"
    else
        echo "Failed to push tag $release_tag to origin."
    fi
else
    echo "Failed to create tag. Not pushing."
fi