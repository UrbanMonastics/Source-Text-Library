#!/bin/bash
SCRIPT_DIR="$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
PROJECT_DIR="$(dirname -- "$(realpath -- "$SCRIPT_DIR")")"

echo
echo
echo "STARTING CONTAINERS FOR PROJECT: UrbanMonastics/Source-Text-Library"
echo


# validate our current working directory has no spaces
if [[ "$PROJECT_DIR" =~ " " ]]
then
	echo "You have a space in your directory path. Please use a path without any spaces."
	exit 1
fi


# start in the background
docker-compose -f "$PROJECT_DIR"/docker-compose.yml up  -d

echo
echo "You can connect from your development (host) machine to these services:"
echo "SourceTextLibrary:    http://localhost:8080/"
echo
