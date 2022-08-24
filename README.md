# Demo: Docker container roles pattern for monolith Laravel apps

### Starting the app

Build the application main container:
`DOCKER_BUILDKIT=1 docker build --pull -t role-app -f docker/app/Dockerfile .`

Build nginx proxy container:
`DOCKER_BUILDKIT=1 docker build --pull -t role-app-nginx -f docker/nginx/Dockerfile .`

Pull Redis container:
`docker pull redis:7-alpine`

Start the stack:
`env $(cat .env | grep ^[A-Z] | xargs) docker-compose up -d`
