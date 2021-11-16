#!/bin/bash
SCRIPT_DIR="$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
PROJECT_DIR="$(dirname -- "$(realpath -- "$SCRIPT_DIR")")"

# build our project
docker-compose -f "$PROJECT_DIR"/docker-compose.yml build