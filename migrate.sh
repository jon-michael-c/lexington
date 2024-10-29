#!/bin/bash

# Step 1: Run WP Migrate command
echo "Running WP Migrate command..."
wp migrate profile 2

# Step 2: SSH into remote server and run Composer
REMOTE_USER="lexington"
REMOTE_HOST="lexington.leibowitzdesign.com"
THEME_PATH="/home/lexington/bedrock/web/app/themes/lexington"


echo "Connecting to remote server..."
ssh -p 47259 "$REMOTE_USER@$REMOTE_HOST" << EOF
    echo "Navigating to theme folder..."
    cd "$THEME_PATH" || exit
    echo "Running composer install..."
    composer install
EOF

echo "Script completed."

