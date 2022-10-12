
## News Thread

Small work for job application. In which you can check all news, read them and comment. You can create, update and delete news, also you can create comment for specific news. 

## To start

1. Turn on your favorite editor, also don't forget that you will need Docker to run this project.

2. Commands and things to do order that you'll need to run this project: :

2.1. In editor terminal: git clone https://github.com/Dambar93/news_page
2.2. In editor terminal: composer install
2.3. Copy .env.examlpe and rename it to .env
2.4. In editor new terminal: ./vendor/bin/sail up
2.5. In editor new terminal: ./vendor/bin/sail bash or sudo ./vendor/bin/sail bash, then write: php artisan migrate --seed
2.6. In your browser write http://localhost/
