# Laravel 11 Rest Api With Sanctum Auth API

  - Step 1: Create/Install Laravel 11 Project

  - Step 2:Run DB Seeder Command "php artisan db:seed"(includes test user,check user details can view inside 
            database/seeder folder)
  
  - Step 3: Install Sanctum API(no api route present in Laravel 11 need to add via command: php artisan install:api)
  			    After add "HasApiTokens" in User Model along with " use HasFactory, Notifiable"

  - Step 4: Create Product Migration with required fields and Model
  
  - Step 5: Create Required API Routes (Refer routes/api.php) 
  
  - Step 6: Create Required Controller Files(Refer Controller folder in Api folder)
  
  - Step 7: Run Laravel 11 App


  --PS: You Can Create your own user details via api url

        --Regiser : URL:http://localhost:8000/api/register
        --Login   : URL:http://localhost:8000/api/login   