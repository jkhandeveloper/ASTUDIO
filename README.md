Setup instructions:

1. Intall Apache, PHP, and mysql (OR install MAMP in Mac. XAMPP in window).
2. Intall compser.
3. Clone This repository (https://github.com/jkhandeveloper/ASTUDIO.git)
4. Update .env file
   
    DB_CONNECTION=mysql
   
    DB_HOST=127.0.0.1
   
    DB_PORT=3306
   
    DB_DATABASE=
   
    DB_USERNAME=
   
    DB_PASSWORD=
   
    SESSION_DRIVER=file
   
6. Run migration (php artisan migrate)
7. Install passport
    composer require laravel/passport
    php artisan migrate
    php artisan passport:install
       yes
       yes

8. RUN Seeds
    php artisan db:seed
   

 10. API Route List
    
 NOTE:     
        Header "Accept"=>”application/json” is must 
        Bearer Token is mendatory for all API except register and login routes
    
  POST: api/register
    Request:
        {
          "first_name": "",
          "last_name": "",
          "email": "",
          "password": ""
        }

    Response:
        "token": "",
        "user": {
            "first_name": "",
            "last_name": "",
            "email": "",
        }        
        
  POST: api/login
  
    Request:
      {
        "email": "",
        "password": ""
      }

    Response:
      "token": "",
      "user": {
          "first_name": "",
          "last_name": "",
          "email": "",
      }  
            
  POST: api/logout
  
      Response:
      {
        "message": "Logged out successfully"
      }
      
  GET|HEAD: api/projects 
      (Use filter like = /api/projects?filters[name]=test1)
      
      Response:
      [
        {
            "name": "",
            "status": ""
        }
    ]

  POST: api/projects
  
    Request:
       {
            "name": "",
            "status": ""
        }

    Response:
      [
        {
            "name": "",
            "status": "active"
        }
      ]

  GET|HEAD: api/projects/{project}
  
  Response:
        {
            "name": "",
            "status": ""
        }

  PUT|PATCH: api/projects/{project}
  
  Response:
        {
            "name": "",
            "status": ""
        }

  DELETE: api/projects/{project}
  
  Response:
    {
        "message": "Deleted successfully"
    }

  GET|HEAD: api/timesheets
  
  Response:
  [
    {
        "task_name": "",
        "date": "",
        "hours":
    }
 ]

  POST: api/timesheets
  
  Response:
    {
        "task_name": "",
        "date": "",
        "hours":
    }

  GET|HEAD: api/timesheets/{timesheet}
  
  Response:
    {
        "task_name": "",
        "date": "",
        "hours":
    }

  PUT|PATCH: api/timesheets/{timesheet}
  
  Response:
    {
        "task_name": "",
        "date": "",
        "hours":
    }

  DELETE: api/timesheets/{timesheet}
  
  Response:
    {
        "message": "Deleted successfully"
    }

  GET|HEAD: api/users
  
  Response: 
    [
        {
            "first_name": "",
            "last_name": "",
            "email": ""
        }
    ]

  POST: api/users
  
      Response: 
        {
            "first_name": "",
            "last_name": "",
            "email": "",
        }

  GET|HEAD: api/users/{user}
  
      Response: 
        {
            "first_name": "",
            "last_name": "",
            "email": "",
        }

  PUT|PATCH: api/users/{user}
  
      Response: 
        {
            "first_name": "",
            "last_name": "",
            "email": "",
        }

  DELETE: api/users/{user}
  
      Response:
        {
            "message": "Deleted successfully"
        }
        
   GET|HEAD: api/attributes
   
      Response:
       [
            {
                "name": "",
                "type": ""
            }
        ]

  POST: api/attributes
  
      Request: 
        {
          "name": "test attribute 2",
          "type": "text"
        }

    Response: 
    {
        "name": "",
        "type": "",
        "updated_at": "",
        "created_at": ""
    }

  GET|HEAD: api/attributes/{attribute}
  
    Response: 
    {
        "name": "",
        "type": "",
    }

  PUT|PATCH: api/attributes/{attribute}
  
    Response: 
    {
        "name": "",
        "type": "",
        "updated_at": "",
        "created_at": ""
    }

  DELETE: api/attributes/{attribute}
  
  Response:
    {
        "message": "Deleted successfully"
    }
