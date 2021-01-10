echo 'Проект поднимается'
echo "\n"
./vendor/bin/sail up -d

docker exec -it app bash
