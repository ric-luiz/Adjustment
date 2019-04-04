FROM golang:alpine

LABEL maintainer="Huadong Zuo <admin@zuohuadong.cn>"

RUN apk add --no-cache \
    openssh \
    git \
    build-base && \
    go get github.com/abiosoft/caddyplug/caddyplug \
    && caddyplug install-caddy \
    apk del build-base

ARG plugins="cors"

#criando a pasta para os logs do caddy
RUN mkdir -p /var/log/caddy/

RUN caddyplug install ${plugins}

RUN apk add --no-cache inotify-tools \
    && echo -e "#!/bin/sh\nwhile inotifywait -e modify /etc/caddy; do\n\tpkill caddy\ndone " >> /start.sh \
    && chmod +x /start.sh

EXPOSE 80 443

WORKDIR /var/www/

CMD ["sh","-c","/start.sh & /usr/bin/caddy -conf /etc/caddy/Caddyfile -agree"]