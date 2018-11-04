
## About Timezone Sender

#### Install

- git clone https://github.com/radserhii/timzone_sender.git
- composer install
- cp .env.example .env
- php artisan key:generate
- npm install
- edit the .env file to DB conection
- php artisan config:clear
- php artisan migrate
- php artisan db:seed
- php artisan serve

#### View capability

After registration, you can view Subscribers and view, add, delete Campaigns 

#### Check the task (view chosen subscribers of campaigns)

- php artisan push:send

Example response in terminal(if subscriber timezone time == campaign time):

Campaign name: test Time: 23:50 <br>
Send push to: <br>
Subscriber: Bert West II Subscriber zone time: 2018-11-04 23:45:25 <br>



