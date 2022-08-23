# Demo: Docker container roles pattern for monolith Laravel apps

### run Redis with persistence

`docker run -p 6379:6379 --name redis -d redis --save 60 1 --loglevel warning`

in the `.env` file change `QUEUE_CONNECTION` from `sync` to `redis`