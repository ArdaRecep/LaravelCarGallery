# CarGallery

CarGallery is a vehicle gallery application developed with Laravel. The project features an admin panel for managing cars and brands, and a user interface for viewing detailed information about vehicles. This project includes functionalities such as authorization, authentication, file uploads, and CRUD operations. Laravel's built-in authentication system is utilized.

### Requirements

- **PHP**: 8.2.12
- **Laravel**: 11.15.0
- **Composer**: 2.7.7
- **MySQL MariaDB**: 10.4.32

### Installation Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/ArdaRecep/LaravelCarGallery.git
   cd LaravelCarGallery

2. **Install Dependencies**
   
   ```bash
   composer install

4. **Create Environment File**

   ```bash
   cp .env.example .env

5. **Configure the Environment**

   Open the .env file and set up your database configuration:
   
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=car_gallery
   DB_USERNAME=root
   DB_PASSWORD=

7. **Run Migrations**

   ```bash
   php artisan migrate

8. **Key Generate And NPM Install**

   ```bash
   php artisan key:generate
   npm install
   npm run dev

9. **Serve the Application**
    
    Open a new terminal
   ```bash
   php artisan serve
    

**The application will be accessible at http://localhost:8000**

## Screenshots

### Home Page

<br />

![HomePage1](https://github.com/user-attachments/assets/8976c633-3ff3-4d66-8550-74f93b041946)

***************************************************

![HomePage2](https://github.com/user-attachments/assets/665494ef-45c9-405c-88cb-48233b193c82)

***************************************************

![HomePage3](https://github.com/user-attachments/assets/d5ed7e82-3a0f-4466-b240-619f6885b470)

<br />

### Login Page

**http://localhost:8000/login**
<br />

![Login](https://github.com/user-attachments/assets/89dd0278-7092-452c-97d2-1b7f22e37f6b)

<br />

### Register Page

<br />

![Register](https://github.com/user-attachments/assets/f6853809-70dc-42aa-989c-c0ed0b69ce52)

<br />

### Admin Dashboard

<br />

![AdminDashboard](https://github.com/user-attachments/assets/95a5c453-4adc-44ce-891a-7762cd37d43e)

<br />

### List/Delete/Edit Car/Brand Page

<br />

![CarList](https://github.com/user-attachments/assets/1080dbd0-5f4d-48f9-8b3b-a7016c00143d)

***************************************************

![BrandList](https://github.com/user-attachments/assets/d8808ada-a911-4c42-a281-4edc33ea644d)

<br />

### Add/Edit Car/Brand Page

<br />

![CarEdit](https://github.com/user-attachments/assets/c8210c56-e3bd-4678-af96-708fc4ddfafc)

***************************************************

![BrandEdit](https://github.com/user-attachments/assets/f1a8b084-58b0-466a-a36a-8c3ef370686a)

<br />

### View Car/Brand Details Page

<br />

![CarDetails1](https://github.com/user-attachments/assets/0e60a693-52b5-450c-af86-03f82e0f5996)

***************************************************

![CarDetails2](https://github.com/user-attachments/assets/940ad7fb-402c-46a2-8cb9-54873dac8f5e)

***************************************************

![CarDetails3](https://github.com/user-attachments/assets/ac08781a-79bb-4a75-a7bb-5f51d5d5633f)

***************************************************

![BrandDetails1](https://github.com/user-attachments/assets/3ff4501e-4947-461d-aa31-8617c7cec7fe)

***************************************************

![BrandDetails2](https://github.com/user-attachments/assets/6e877212-ab30-4f65-89f2-dc73f6d58b13)

<br />

