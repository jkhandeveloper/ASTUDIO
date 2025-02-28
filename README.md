Setup instructions:

1. Intall Apache, PHP, and mysql (OR install MAMP in Mac. XAMPP in window).
2. Intall compser.
3. Clone This repository (https://github.com/jkhandeveloper/ASTUDIO.git)
4. Run migration (php artisan migrate)
5. Install passport
    composer require laravel/passport
    php artisan migrate
    php artisan passport:install
       yes
       yes
   

 6. API Route List
    
    NOTE: Header "Accept"=>”application/json” is must
    
  POST: api/register
    Request Body
        {
          "first_name": "khan",
          "last_name": "test",
          "email": "khan@test.com",
          "password": "password123"
        }

    Response
        "token": "",
        "user": {
            "first_name": "khan",
            "last_name": "test",
            "email": "khan@example.com",
        }        
  POST: api/login
  
      Request Body
        {
          "email": "khan@test.com",
          "password": "password123"
        }
    Response
            "token": "",
            "user": {
                "first_name": "khan",
                "last_name": "test",
                "email": "khan@example.com",
            }  
            
  POST: api/logout
      Response
      {
        "message": "Logged out successfully"
      }
  GET|HEAD: api/projects (Use filter like = /api/projects?filters[name]=test1)
      Response
      [
      {
            "name": "test projects",
            "status": "active"
        },
        {
            "name": "test projects",
            "status": "active"
        }
    ]
  POST: api/projects
  GET|HEAD: api/projects/{project}
  PUT|PATCH: api/projects/{project}
  DELETE: api/projects/{project}
  GET|HEAD: api/timesheets
  POST: api/timesheets
  GET|HEAD: api/timesheets/{timesheet}
  PUT|PATCH: api/timesheets/{timesheet}
  DELETE: api/timesheets/{timesheet}
  GET|HEAD: api/users
  POST: api/users
  GET|HEAD: api/users/{user}
  PUT|PATCH: api/users/{user}
  DELETE: api/users/{user}

 
