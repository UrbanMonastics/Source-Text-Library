#!/bin/bash
SCRIPT_DIR="$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
PROJECT_DIR="$(dirname -- "$(realpath -- "$SCRIPT_DIR")")"

echo
echo
echo "STOPPING CONTAINERS FOR PROJECT: UrbanMonastics/Source-Text-Library"
echo

# stop project containers
docker-compose -f "$PROJECT_DIR"/docker-compose.yml stop