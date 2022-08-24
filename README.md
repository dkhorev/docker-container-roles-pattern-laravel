# Demo: Docker container roles pattern for monolith Laravel apps

### run Redis with persistence

`docker run -p 6379:6379 --name redis -d redis --save 60 1 --loglevel warning`

in the `.env` file change `QUEUE_CONNECTION` from `sync` to `redis`

### Build the containers

server itself:
`DOCKER_BUILDKIT=1 docker build --pull -t role-app -f docker/app/Dockerfile .`

web:
`DOCKER_BUILDKIT=1 docker build --pull -t role-app-nginx -f docker/nginx/Dockerfile .`
