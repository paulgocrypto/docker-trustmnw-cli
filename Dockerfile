ARG NODE_VERSION=16.19
ARG ALPINE_VERSION=3.18

FROM node:${NODE_VERSION}-alpine AS node

FROM alpine:${ALPINE_VERSION}

COPY --from=node /usr/lib /usr/lib
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin

RUN apk update && apk add --no-cache bash

WORKDIR /home/node

RUN apk add --no-cache -U sudo curl procps-ng

RUN addgroup -S node && adduser -S node -G node

RUN npm install @morpheusnetwork/trustmnw-cli -g

COPY --chown=node:node . .

ENV NODE_ENV=production

USER node

#RUN node -v
#RUN npm --version
#RUN npm view @morpheusnetwork/trustmnw-cli

CMD ["bash"]

