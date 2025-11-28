./artisan migrate --seed
printf "%s\\n" \
    "Call to /api/login with JSON request containing" \
    "" \
    '    {"email": "user@example.com", "password": "thepassword"}' \
    "" \
    "and grab the bearer token."

./artisan serve
