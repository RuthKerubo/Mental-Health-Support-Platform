
# MindScape: Mental Health Support Platform

MindScape is a web application designed to provide accessible mental health resources and support. Our platform offers a range of services including helplines, a resource library, and community support groups to help users navigate their mental health journey.

## Features

- **Resource Library**: Access a wide range of articles, tools, and self-help guides.
- **Helplines**: Connect with trained professionals available 24/7.
- **Community Support Groups**: Join and participate in supportive communities.
- **Feedback System**: Users can provide feedback on resources, helping us improve our offerings.

## Technology Stack

- Laravel (PHP Framework)
- MySQL Database
- Docker
- Tailwind CSS
- Node.js and npm for asset compilation

## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Installation

1. Clone the repository:
   
   git clone https://github.com/RuthKerubo/Mental-Health-Support-Platform.git
   cd Mental-Health-Support-Platform

2. Copy the example environment file:

   cp .env.example .env

3. Start the Docker containers:

   docker-compose up -d

4. Install PHP dependencies:

   docker-compose exec app composer install

5. Install Node.js dependencies and compile assets:

   docker-compose exec app npm install
   docker-compose exec app npm run dev

6. Generate application key:

   docker-compose exec app php artisan key:generate

7. Run database migrations and seed the database:

   docker-compose exec app php artisan migrate --seed

8. Create a symbolic link for storage:

   docker-compose exec app php artisan storage:link

### Accessing the Application

- Main application: [http://localhost:8000](http://localhost:8000)
- Admin panel: [http://localhost:8000/admin](http://localhost:8000/admin)

### Admin Credentials

For testing purposes, you can use the following admin credentials:

- **Email**: admin@gmail.com
- **Password**: Admin@1234

**Note**: These credentials are for testing only. Please change them immediately in a production environment.

## Important Notes

- **Database Persistence**: The database is configured to persist across container restarts using Docker volumes. Your data will remain intact as long as you do not remove the volume.
  
- **No Rebuild Required**: When starting your application, use `docker-compose up -d` without the `--build` option to avoid rebuilding containers and ensure that your database remains unchanged.

## License

This project is licensed under the MIT License.
