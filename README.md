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
   ```

### Accessing the Application

- Main application: [http://localhost:8000](http://localhost:8000)
- Admin panel: [http://localhost:8000/admin](http://localhost:8000/admin)

### Admin Credentials

For testing purposes, you can use the following admin credentials:

- **Email**: admin@gmail.com
- **Password**: Admin@1234

> **Note**: These credentials are for testing only. Please change them immediately in a production environment.

## Important Notes

- **Database Persistence**: The database is configured to persist across container restarts using Docker volumes, ensuring your data remains intact unless the volume is removed.
  
- **No Rebuild Required**: When starting your application, use `docker-compose up -d` without the `--build` option to avoid rebuilding containers and maintain your database state.

## License

This project is licensed under the MIT License.

