# MindScape: Mental Health Support Platform

MindScape is a web application dedicated to providing accessible mental health resources and support. Our platform offers a variety of services, including helplines, a comprehensive resource library, and community support groups to assist users in navigating their mental health journey.

## Features

- **Resource Library**: Access a diverse collection of articles, tools, and self-help guides tailored to various mental health topics.
- **Helplines**: Connect with trained professionals available 24/7 for immediate assistance and guidance.
- **Community Support Groups**: Join and engage with supportive communities that foster shared experiences and understanding.
- **Feedback System**: Users can provide feedback on resources, enabling continuous improvement of our offerings.

## Technology Stack

- **Laravel**: PHP Framework for building the application.
- **MySQL**: Database management system for storing user data and resources.
- **Docker**: Containerization platform to simplify deployment and management.
- **Tailwind CSS**: Utility-first CSS framework for styling the application.
- **Node.js & npm**: Used for asset compilation and frontend dependencies.

## Getting Started

### Prerequisites

- **Docker**
- **Docker Compose**

### Installation Steps

1. **Clone the Repository**:
   ```
   git clone https://github.com/RuthKerubo/Mental-Health-Support-Platform.git
   cd Mental-Health-Support-Platform
   ```

2. **Copy the Example Environment File**:
   ```
   cp .env.example .env
   ```

3. **Start the Docker Containers**:
   ```
   docker-compose up -d
   ```

4. **Install PHP Dependencies**:
   ```
   docker-compose exec app composer install
   ```

5. **Install Node.js Dependencies and Compile Assets**:
   ```
   docker-compose exec app npm install
   docker-compose exec app npm run dev
   ```

6. **Generate Application Key**:
   ```
   docker-compose exec app php artisan key:generate
   ```

7. **Run Database Migrations and Seed the Database**:
   ```
   docker-compose exec app php artisan migrate --seed
   ```

8. **Create a Symbolic Link for Storage**:
   ```
   docker-compose exec app php artisan storage:link
   ```Here's a comprehensive README file that you can provide to users for hosting the MindScape application. This guide includes instructions on setting up the environment, importing the MySQL database, and accessing the application.

---

# MindScape Application Setup

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- PHP (version 8.3 or higher)
- Composer
- MySQL (version 8.0 or higher)
- Git
- A web server (Apache or Nginx)

## Steps to Host the Application

### 1. Clone the Repository

If you haven't already, clone the repository to your local machine:

```bash
git clone https://github.com/yourusername/Mental-Health-Support-Platform.git
cd Mental-Health-Support-Platform
```

### 2. Set Up Environment Variables

Create a `.env` file in the root of your project directory. You can copy from the provided example:

```bash
cp .env.example .env
```

Edit the `.env` file and set the following variables:

```plaintext
APP_NAME=MindScape
APP_ENV=local
APP_KEY=base64:your_generated_key_here  # Generate this key using `php artisan key:generate`
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mental_health_db
DB_USERNAME=general_user
DB_PASSWORD=your_secure_password_here

MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=your_mail_port
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_from_email
MAIL_FROM_NAME="${APP_NAME}"
```

### 3. Create and Import the Database

1. **Create a Database**:
   Log in to your MySQL server and create a new database:

   ```sql
   CREATE DATABASE mental_health_db;
   ```

2. **Import Database Dump**:
   

   ```
   mysql -u general_user -p mental_health_db < ../database_backup.sql
   ```

   Make sure to replace `general_user` with your actual MySQL username and enter the password when prompted.

### 4. Install Dependencies

Navigate to your project directory and run Composer to install the required dependencies:

```
composer install --no-interaction --no-dev --prefer-dist
```

### 5. Generate Application Key

Generate an application key using Artisan:

```
php artisan key:generate
```

### 6. Run Migrations (if necessary)

If there are any migrations to run, execute:

```
php artisan migrate --seed  # This will also seed the database if you have seeders set up.
```

7. Start the Application Using Artisan Serve
You can run your application using Laravel's built-in server:
```
php artisan serve --host=127.0.0.1 --port=8000
```
### 8. Accessing the Application

Open your web browser and navigate to [http://localhost](http://localhost). You should see the MindScape application running.

- Main application: [http://localhost:8000](http://localhost:8000)
- Admin panel: [http://localhost:8000/admin](http://localhost:8000/admin)

#### Admin Test User Credentials

For testing purposes, you can use the following admin credentials:

- **Email**: admin@gmail.com  
- **Password**: Admin@1234  

> **Note**: These credentials are for testing only. Please change them immediately in a production environment.


## License

This project is licensed under the MIT License.

