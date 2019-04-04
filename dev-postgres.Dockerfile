FROM postgres:alpine

LABEL maintainer="Ben M <git@bmagg.com>"

#- ${DATA_PATH_HOST}/postgres:/var/lib/postgresql/data
#- ${POSTGRES_ENTRYPOINT_INITDB}:/docker-entrypoint-initdb.d

#COPY /configuration-dockerfile/postgres/docker-entrypoint-initdb.d /docker-entrypoint-initdb.d

CMD ["postgres"]

EXPOSE 5432
