
# docker-trustmnw-cli
Morpheus masternode Alpine docker with node + trustmnw-cli


## Quick start

Assumption you have [docker and docker-compose](https://www.howtogeek.com/devops/how-to-install-docker-and-docker-compose-on-linux/) installed.

### 1. Clone this repo to bootstrap docker container

```bash
$ mkdir -p /opt/trustmnw-docker
$ cd /opt/trustmnw-docker

$ git clone https://github.com/paulgocrypto/docker-trustmnw-cli.git
```

### 2. Build the docker image and start container

```bash
$ docker-compose up -d
```

### 3. Login with trustmnw-cli
 
```bash
$ docker exec -it trustmnw /usr/local/bin/trustmnw-cli login
```

### 4. Check status with trustmnw-cli

```bash
$ docker exec -it trustmnw /usr/local/bin/trustmnw-cli status
```

![image](https://github.com/paulgocrypto/docker-trustmnw-cli/assets/100031513/862d1994-91d3-467f-a9ff-9aa13768a240)


NB: ```<ctrl> + <c>``` to exit.


## Other usefull commands.

**force image rebuild** after changing settings in Dockerfile 
```bash
$ docker-compose up --force-recreate --remove-orphans --build -d
```


**check image + tag**
```bash
$ docker image ls
```


**enter conatiner for multiple commands**
```bash
$ docker exec -it trustmnw bash
```

**force upgrade version, rebuild image**
```bash
$ docker-compose build --no-cache
```

## TODO

 - Test healthcheck without being loggedon ( extend start_period time?! )
 - Tag and push docker image to docker hub/repo 
   - docker tag local-image:tagname new-repo:tagname
   - docker push new-repo:tagname
   - update docker-compose to use prebuild image.
 - Add external monitoring docker (e.g. webdevops/php-apache:8.2) or some other monitoring to check on data/web/index.php
