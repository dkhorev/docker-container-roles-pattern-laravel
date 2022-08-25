# Demo: Docker container roles pattern for monolith Laravel apps

This sample project demonstrates the usage of container role pattern when deploying Laravel apps.

See the full article
here: [https://medium.com/@dkhorev/docker-container-roles-pattern-for-laravel-apps-d445a62d230f](https://medium.com/@dkhorev/docker-container-roles-pattern-for-laravel-apps-d445a62d230f)

### Starting the app

Install composer dependencies: \
`composer i`

Pull Redis container: \
`docker pull redis:7-alpine`

Build the application main container: \
`DOCKER_BUILDKIT=1 docker build --pull -t role-app -f docker/app/Dockerfile .`

Build nginx proxy container: \
`DOCKER_BUILDKIT=1 docker build --pull -t role-app-nginx -f docker/nginx/Dockerfile .`

Start the stack: \
`env $(cat .env | grep ^[A-Z] | xargs) docker-compose up -d`

Stop the stack: \
`docker-compose down`